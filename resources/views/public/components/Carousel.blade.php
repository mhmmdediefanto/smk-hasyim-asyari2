<div class="relative  w-full overflow-hidden">

    <div class="flex flex-nowrap transition-transform duration-500 ease-in-out" id="carousel">
        @foreach ($carousels as $carousel)
            <div class="min-w-full relative"><img src="{{ asset('storage/' . $carousel->image) }}"
                    class="w-full lg:h-[88vh] object-center" >
                <div class="absolute inset-0 flex flex-col items-center justify-center text-white text-center">
                    <h1 class="text-3xl font-bold ">Judul Slide 1</h1>
                    <p class="text-lg">Tagline untuk slide pertama</p>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Tombol Navigasi -->
    <button onclick="prevSlide()"
        class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full">&#10094;</button>
    <button onclick="nextSlide()"
        class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full">&#10095;</button>
</div>


<script>
    let currentIndex = 0;
    const slides = document.querySelectorAll("#carousel > div");
    const totalSlides = slides.length;

    function updateCarousel() {
        document.getElementById("carousel").style.transform = `translateX(-${currentIndex * 100}%) `;
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1) % totalSlides;
        updateCarousel();
    }

    function prevSlide() {
        currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
        updateCarousel();
    }

    function autoSlide() {
        nextSlide();
    }

    setInterval(autoSlide, 3000); // Ganti slide setiap 3 detik
</script>
