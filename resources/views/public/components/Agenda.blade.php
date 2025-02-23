<div class="flex justify-center ">
    <h1 data-aos="fade-up" class="text-xl font-bold  font-neutrif text-slate-800 border-b-2 block border-cyan-500">
        Agenda
        Terbaru</h1>
</div>
<div class="grid grid-cols-1 lg:gap-4 gap-3">
    @foreach ($agendas as $agenda)
        <div data-aos="zoom-in-up"
            class="w-full shadow-sm rounded-lg overflow-hidden bg-white px-3 py-3 flex flex-row gap-2 items-center">
            <div class="w-16 h-16 rounded-lg overflow-hidden flex items-center justify-center flex-col "
                style="background-color: #F1F1F1">
                <p class="font-neutrif font-bold text-slate-900 text-[16px]">
                    {{ \Carbon\Carbon::parse($agenda->tanggal_mulai)->format('M') }}</p>
                <p class="font-neutrif font-bold text-slate-900 text-[16px]">
                    {{ \Carbon\Carbon::parse($agenda->tanggal_mulai)->format(' d') }}</p>
            </div>

            <div class="flex flex-col w-[310px]">
                <a href="{{ route('agenda-kegiatan.show', $agenda->slug) }}"
                    class="text-[16px] lg:text-[16px] font-semibold font-neutrif text-slate-800 cursor-pointer hover:text-cyan-500 transition-all ease-in-out duration-300">{{ $agenda->title }}
                </a>
                <span class="text-[10px] text-slate-500 font-neutrif lg:text-sm"> <i
                        class="uil uil-calender text-lg"></i> {{ $agenda->tanggal_mulai_formatted }}</span>
                <p class=" text-[12px] text-slate-500 lg:text-sm font-neutrif"> <i
                        class="uil uil-map-marker text-lg"></i> {{ $agenda->tempat }}
                </p>
            </div>
        </div>
    @endforeach
</div>

<div class="text-center flex justify-center">
    <a href="{{ route('agenda-kegiatan') }}"
        class="capitalize font-neutrif font-bold text-sm text-slate-900 flex items-center gap-2 hover:text-cyan-500 transition-all ease-in-out duration-300">
        Lihat semua
        agenda <i class="uil uil-arrow-to-right text-slate-900 text-lg"></i></a>
</div>
