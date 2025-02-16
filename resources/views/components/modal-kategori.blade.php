<!-- Modal -->
<!-- Main modal -->
<div id="{{ $modalId . $id }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm ">
            <!-- Modal header -->
            <div
                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                <h3 class="text-xl font-semibold text-slate-600 font-nunito">
                    {{ $modalTitle }}
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="{{ $modalId . $id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            {{-- <pre>{{ var_dump($kategori) }}</pre> --}}
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <form action="{{ $modalRoute }}" method="{{ $modalMethod }}">
                    @method($methodUpdate)
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="block mb-2 text-sm font-mediumtext-white font-nunito">Title</label>
                        <input type="text" name="name" id="titleKategori_{{ $id }}"
                            class="form-input font-nunito" required value=" {{ $kategori->name ?? '' }} ">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="block mb-2 text-sm font-mediumtext-white font-nunito">Slug</label>
                        <input type="text" name="slug" id="slugKategori_{{ $id }}"
                            value="{{ $kategori->slug ?? '' }}" class="form-input font-nunito bg-cyan-300" readonly
                            style="cursor: not-allowed" required>
                    </div>

                    <button type="submit"
                        class="py-1 px-2 bg-cyan-500 !text-sm text-white hover:bg-cyan-600 active:bg-cyan-400 cursor-pointer rounded-sm">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let title = document.getElementById("titleKategori_{{ $id }}");
            let slug = document.getElementById("slugKategori_{{ $id }}");
            const model = "KategoriBerita";
            let debounceTimeout;

            if (title && slug) {
            title.addEventListener("keyup", function () {
                clearTimeout(debounceTimeout); // Hapus timeout sebelumnya
                
                debounceTimeout = setTimeout(() => {
                    fetch("{{ route('dashboard.berita.checkSlug') }}" +
                        `?model=${model}&title=${encodeURIComponent(title.value)}`)
                        .then((response) => response.json())
                        .then((data) => (slug.value = data.slug))
                        .catch((error) => console.error(error));
                }, 500); // Delay 500ms sebelum request dikirim
            });
        }
        })
    </script>
@endpush
