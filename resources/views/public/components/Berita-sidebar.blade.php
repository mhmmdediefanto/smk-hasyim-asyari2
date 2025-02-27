<div class="mb-3">
    <h2 class="text-slate-900 font-neutrif font-bold text-lg capitalize mb-3 border-b-2 inline border-cyan-500">
        berita terpopuler</h2>
</div>
<div class="grid grid-cols-1 gap-4">
    @foreach ($beritaTerpopulers as $beritaTerpopuler)
        <div class="flex gap-3 items-center">
            <div class="w-[70px] h-[40px] overflow-hidden">
                <img src="{{ asset('storage/' . $beritaTerpopuler->image) }}" alt="{{ $beritaTerpopuler->slug }}"
                    class=" object-cover h-full w-full">
            </div>
            @php
                // Potong excerpt menjadi 100 karakter
                $title = substr($beritaTerpopuler->title, 0, 100);
                // Menambahkan "..." jika teks terpotong
                $title = rtrim($title, '.') . '...';
            @endphp
            <div class="flex w-full flex-col">
                <a href="{{ route('berita.show', $beritaTerpopuler->slug) }}"
                    class="font-bold text-slate-900 font-neutrif">{{ $title }}</a>
                <p class="text-slate-400 italic text-sm font-neutrif mt-1">
                    {{ $beritaTerpopuler->created_at_formatted }}</p>
            </div>
        </div>
    @endforeach
</div>
