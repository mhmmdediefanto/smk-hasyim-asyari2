@extends('dashboard.layouts.main')

@section('main')
    <div class="w-full">
        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses!',
                    text: "{{ session('success') }}",
                });
            </script>
        @endif
        @if (session('error'))
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: "{{ session('error') }}",
                });
            </script>
        @endif
        <div class="card overflow-hidden p-5">
            <div class="card-header flex justify-between items-center">
                <h4 class="card-title">Tambah Agenda Kegiatan</h4>
            </div>
            <div class="card-body mt-5">
                <form action="{{ route('dashboard.agenda-kegiatan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                        <div>
                            <label for="title" class="text-gray-800 text-sm font-medium inline-block mb-2">Judul
                                Agenda</label>
                            <input type="text" id="title" name="title" required
                                class="form-input @error('title') border-red-500   
                            @enderror"
                                autofocus>
                            @error('title')
                                <p class="text-red-500 text-[12px] font-nunito">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="slug" class="text-gray-800 text-sm font-medium inline-block mb-2">Slug</label>
                            <input type="text" id="slug" class="form-input bg-cyan-300" readonly="" required
                                name="slug" style="cursor: not-allowed;">
                        </div>

                        <div>
                            <label for="image" class="text-gray-800 text-sm font-medium inline-block mb-2">Gambar</label>
                            <label for="image" class="sr-only">Choose file</label>
                            <input type="file" name="image" id="image"
                                class="block w-full border border-gray-200 shadow-sm rounded-md
                                text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 
                                disabled:opacity-50 disabled:pointer-events-none
                                 
                              file:bg-gray-50 file:border-0
                              file:me-4
                              file:py-2 file:px-4
                              "
                                required>

                        </div>

                        <div>
                            <label for="tanggal_mulai" class="text-gray-800 text-sm font-medium inline-block mb-2">Tanggal
                                Mulai</label>
                            <input type="date" id="tanggal_mulai" class="form-input" required name="tanggal_mulai">
                        </div>
                        <div>
                            <label for="tanggal_selesai" class="text-gray-800 text-sm font-medium inline-block mb-2">Tanggal
                                Selesai</label>
                            <input type="date" id="tanggal_selesai" class="form-input" required name="tanggal_selesai">
                        </div>
                        <div>
                            <label for="penyelenggara"
                                class="text-gray-800 text-sm font-medium inline-block mb-2">Penyelenggara</label>
                            <input type="text" id="penyelenggara" class="form-input" required name="penyelenggara">
                        </div>

                    </div>

                    <div class="mt-3">
                        <label for="tempat" class="text-gray-800 text-sm font-medium inline-block mb-2">Lokasi</label>
                        <input type="text" id="tempat" class="form-input" required name="tempat">
                    </div>
                    <div class="w-full mt-5 flex mb-5 flex-col">
                        <label for="snow-editor" class="text-gray-800 text-sm font-medium inline-block mb-2">Content</label>

                    </div>
                    <textarea id="editor" class="ckeditor" name="body"></textarea>

                    <div class="mt-5">
                        <button type="submit"
                            class="py-1 px-2 bg-cyan-500 !text-sm text-white hover:bg-cyan-600 active:bg-cyan-400 cursor-pointer rounded-sm">Simpan</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        //halaman create
        ClassicEditor
            .create(document.querySelector('#editor'), {
                toolbar: {
                    image: {
                        toolbar: [
                            'imageStyle:block',
                            'imageStyle:side',
                            'imageStyle:center',
                            '|',
                            'resizeImage', // Menyertakan toolbar untuk resize
                            'imageTextAlternative',
                            'imageStyle:full',
                        ]
                    },
                    table: {
                        contentToolbar: [
                            'tableColumn',
                            'tableRow',
                            'mergeTableCells',
                            'tableCellProperties',
                            'tableProperties'
                        ]
                    }

                },
                resizeUnit: "%",
                resizeOptions: [{
                        name: 'resizeImage:original',
                        value: null
                    },
                    {
                        name: 'resizeImage:50',
                        value: '50'
                    },
                    {
                        name: 'resizeImage:75',
                        value: '75'
                    }
                ],

                ckfinder: {
                    uploadUrl: "{{ route('upload-image') }}?_token={{ csrf_token() }}"
                }
            })
            .then(editor => {
                editorInstance = editor;
                let previousContent = editor.getData(); // Simpan konten awal

                editor.model.document.on('change:data', () => {
                    let newContent = editor.getData();
                    let deletedImages = findDeletedImages(previousContent, newContent);

                    if (deletedImages.length > 0) {
                        deletedImages.forEach(imageUrl => {
                            deleteImageFromServer(imageUrl);
                        });
                    }

                    previousContent = newContent; // Perbarui konten sebelumnya
                });
            })
            .catch(error => {
                console.error(error);
            });

        function findDeletedImages(oldContent, newContent) {
            let oldImages = extractImageUrls(oldContent);
            let newImages = extractImageUrls(newContent);

            return oldImages.filter(img => !newImages.includes(img));
        }

        function extractImageUrls(content) {
            let matches = content.match(/<img.*?src=["'](.*?)["']/g) || [];
            return matches.map(imgTag => imgTag.match(/src=["'](.*?)["']/)[1]);
        }

        function deleteImageFromServer(imageUrl) {
            let filename = imageUrl.split('/').pop(); // Ambil nama file dari URL
            fetch("{{ route('delete-image') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        filename: filename
                    })
                }).then(response => response.json())
                .then(data => {
                    console.log(data.message);
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let title = document.getElementById('title');
            let slug = document.getElementById('slug');
            let debounceTimeout;

            if (title && slug) {
                title.addEventListener("keyup", function() {
                    clearTimeout(debounceTimeout); // Hapus timeout sebelumnya

                    debounceTimeout = setTimeout(() => {
                        fetch("{{ route('dashboard.agenda-kegiatan.checkSlug') }}" +
                                `?title=${encodeURIComponent(title.value)}`)
                            .then((response) => response.json())
                            .then((data) => (slug.value = data.slug))
                            .catch((error) => console.error(error));
                    }, 500); // Delay 500ms sebelum request dikirim
                });
            }

        });
    </script>
@endpush
