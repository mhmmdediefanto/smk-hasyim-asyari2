@extends('dashboard.layouts.main')

@section('main')
    <div class="w-full">
        <div class="card overflow-hidden">
            <div class="card-header flex justify-between items-center">
                <h4 class="card-title font-nunito">Data Kategori Berita</h4>
                <!-- Modal toggle -->
                <button data-modal-target="TambahKategori" data-modal-toggle="TambahKategori"
                    class="block text-white bg-cyan-500 font-nunito
                     hover:bg-cyan-800 focus:ring-2 focus:outline-none focus:ring-cyan-300 font-medium rounded-lg text-[10px] px-2 py-1 lg:text-[12px]
                     text-center dark:bg-cyan-600 dark:hover:bg-cyan-700 dark:focus:ring-cyan-800"
                    type="button">
                    <i class="uil uil-plus"></i>
                    Tambah Kategori
                </button>

                {{-- modal create --}}
                <x-modal-kategori modalId="TambahKategori" modalTitle="Tambah Kategori Berita"
                    modalRoute="{{ route('dashboard.kategori-berita.store') }}" modalMethod="POST" id=""
                    kategori="" methodUpdate="" />
            </div>
            @if (session('success'))
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses!',
                        text: "{{ session('success') }}",
                    });
                </script>
            @endif
            <div class="overflow-x-auto">
                <div class="min-w-full inline-block align-middle whitespace-nowrap">
                    <div class="overflow-hidden">
                        <table class="min-w-full">
                            <thead class="bg-light/40 border-b border-gray-200">
                                <tr class="capitalize font-nunito">
                                    <th class="px-6 py-3 text-start">title</th>
                                    <th class="px-6 py-3 text-start">Slug</th>
                                    <th class="px-6 py-3 text-start">action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategories as $kategori)
                                    <tr class="border-b border-gray-200">


                                        <td class="px-6 py-3">{{ $kategori->name }}</td>
                                        <td class="px-6 py-3">{{ $kategori->slug }}</td>
                                        <td class="px-6 py-3">
                                            <div class="flex items-center gap-3">
                                                <button data-modal-target="editKategoriBerita{{ $kategori->id }}"
                                                    data-modal-toggle="editKategoriBerita{{ $kategori->id }}"
                                                    class="relative group text-yellow-500 hover:text-yellow-600">
                                                    <i class="uil uil-file-edit-alt text-lg"></i>
                                                    <span
                                                        class="absolute -top-7 left-1/2 -translate-x-1/2 scale-0 group-hover:scale-100 transition-transform bg-gray-800 text-white text-xs rounded-md py-1 px-2">
                                                        Edit File
                                                    </span>

                                                </button>

                                                {{-- modal edit --}}
                                                <x-modal-kategori modalId="editKategoriBerita"
                                                    modalTitle="Edit Kategori Berita"
                                                    modalRoute="{{ route('dashboard.kategori-berita.update', $kategori->id) }}"
                                                    methodUpdate="PUT" modalMethod="POST" id="{{ $kategori->id }}"
                                                    :kategori="$kategori" />

                                                <a data-confirm-delete="true"
                                                    href="{{ route('dashboard.kategori-berita.delete', $kategori->id) }}"
                                                    class="relative group text-red-500 hover:text-red-600">
                                                    <i class="uil uil-trash-alt text-lg"></i>
                                                    <span
                                                        class="absolute -top-7 left-1/2 -translate-x-1/2 scale-0 group-hover:scale-100 transition-transform bg-gray-800 text-white text-xs rounded-md py-1 px-2">
                                                        Hapus File
                                                    </span>
                                                </a>
                                                @php
                                                    $title = 'Delete Berita';
                                                    $text = 'Are you sure you want to delete?';
                                                    confirmDelete($title, $text);

                                                @endphp
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- end card-->
    </div>
@endsection
