<!-- Modal -->
<!-- Main modal -->
<div id="{{ $modalId }}" tabindex="-1" aria-hidden="true"
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
                    data-modal-hide="{{ $modalId }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <form action="{{ $modalRoute }}" method="{{ $modalMethod }}" enctype="multipart/form-data">
                    @method($methodUpdate)
                    @csrf

                    <!-- Tempat Preview Gambar -->
                    <img src="" alt="Preview Gambar" id="img-priview-edit"
                        style="display: none; max-width: 100%; height: auto;">

                    <div class="mb-3">
                        @if ($carousel)
                            <img src="{{ Storage::url($carousel->image) }}" alt="Gambar Lama" id="img-old-edit"
                                style="max-width: 100%; height: auto;">
                        @endif

                        <input name="old_image" type="hidden" value="{{ $carousel->image ?? '' }}">
                        <label for="image" class="text-gray-800 text-sm font-medium inline-block mb-2">Gambar</label>

                        <input type="file" name="image" id="imageEdit" onchange="priviewUpdateImageEdit()"
                            class="block w-full border border-gray-200 shadow-sm rounded-md
                            text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 
                            disabled:opacity-50 disabled:pointer-events-none
                             
                          file:bg-gray-50 file:border-0
                          file:me-4
                          file:py-2 file:px-4"
                            required>
                            <p class="text-[10px] italic font-neutrif text-red-700"> Uploaded :
                                jpeg,png,jpg,gif,svg|max:2048</p>
                    </div>

                    <div class="mb-3">
                        <label for="title" class="block mb-2 text-sm font-mediumtext-white font-nunito">Title</label>
                        <input type="text" name="title" id="title" class="form-input font-nunito"
                            value="">
                    </div>

                    <div class="mb-3">
                        <label for="tagline"
                            class="block mb-2 text-sm font-mediumtext-white font-nunito">Tagline</label>
                        <input type="text" name="tagline" id="tagline" value=""
                            class="form-input font-nunito">
                    </div>

                    <button type="submit"
                        class="py-1 px-2 bg-cyan-500 !text-sm text-white hover:bg-cyan-600 active:bg-cyan-400 cursor-pointer rounded-sm">
                        Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // edit
    function priviewUpdateImageEdit() {
        let image = document.getElementById("imageEdit");
        let imgImage = document.getElementById("img-priview-edit");
        let imgOld = document.getElementById("img-old-edit");

        console.log("Elemen img-priview:", imgImage);
        console.log("File input:", image.files[0]);

        if (!imgImage) {
            console.warn("Element img-priview tidak ditemukan.");
            return;
        }
        if (!image || image.files.length === 0) {
            console.warn("Tidak ada file yang dipilih.");
            return;
        }

        // Sembunyikan gambar lama jika ada
        if (imgOld) {
            imgOld.style.display = "none";
        }

        // Tampilkan preview baru
        imgImage.style.display = "block";

        // Baca file sebagai Data URL
        const ofReader = new FileReader();
        ofReader.onload = function(orEvent) {
            console.log("Gambar berhasil dimuat!");
            setTimeout(() => {
                imgImage.src = orEvent.target.result;
            }, 100);
        };
        ofReader.onerror = function() {
            console.error("Gagal membaca file.");
        };
        ofReader.readAsDataURL(image.files[0]);
    }

    // Tambahkan event listener untuk memastikan modal siap sebelum dipanggil
    document.addEventListener("DOMContentLoaded", function() {
        let inputImage = document.getElementById("image");
        if (inputImage) {
            inputImage.addEventListener("change", priviewUpdateImage);
        }
    });
</script>
