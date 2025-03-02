@extends('dashboard.layouts.main')

@section('main')
    <div class="w-full">
        <div class="card overflow-hidden">
            <div class="card-header flex justify-between items-center">
                <h4 class="card-title font-nunito">Data Agenda Kegiatan</h4>
                <a href="{{ route('dashboard.agenda-kegiatan.create') }}"
                    class=" py-1 px-2 bg-cyan-500 font-nunito !text-sm text-white hover:bg-cyan-600 active:bg-cyan-400 cursor-pointer rounded-sm ">Tambah
                    Agenda</a>
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
                                    <th class="px-6 py-3 text-start">image</th>
                                    <th class="px-6 py-3 text-start">title</th>
                                    <th class="px-6 py-3 text-start">Penyelenggara</th>
                                    <th class="px-6 py-3 text-start">action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($agendas as $agenda)
                                    <tr class="border-b border-gray-200">
                                        <td class="px-6 py-3"><img src="{{ asset('storage/' . $agenda->image) }}"
                                                alt="{{ $agenda->title }}" width="35"></td>
                                        @php
                                            // Potong excerpt menjadi 100 karakter
                                            $excerptTitle = substr($agenda->title, 0, 75);
                                            // Menambahkan "..." jika teks terpotong
                                            $excerptForTitle = rtrim($excerptTitle, '.') . '...';
                                        @endphp
                                        <td class="px-6 py-3">{{ $excerptForTitle }}</td>
                                        <td class="px-6 py-3">{{ $agenda->penyelenggara }}</td>

                                        <td class="px-6 py-3">
                                            <div class="flex items-center gap-3 justify-center">
                                                <a href="{{ route('dashboard.agenda-kegiatan.edit', $agenda->id) }}"
                                                    class="relative group text-yellow-500 hover:text-yellow-600">
                                                    <i class="uil uil-file-edit-alt text-lg"></i>
                                                    <span
                                                        class="absolute -top-7 left-1/2 -translate-x-1/2 scale-0 group-hover:scale-100 transition-transform bg-gray-800 text-white text-xs rounded-md py-1 px-2">
                                                        Edit File
                                                    </span>
                                                </a>
                                                <a data-confirm-delete="true"
                                                    href="{{ route('dashboard.agenda-kegiatan.delete', $agenda->id) }}"
                                                    class="relative group text-red-500 hover:text-red-600">
                                                    <i class="uil uil-trash-alt text-lg"></i>
                                                    <span
                                                        class="absolute -top-7 left-1/2 -translate-x-1/2 scale-0 group-hover:scale-100 transition-transform bg-gray-800 text-white text-xs rounded-md py-1 px-2">
                                                        Hapus File
                                                    </span>
                                                </a>
                                                @php
                                                    $title = 'Delete agenda';
                                                    $text = 'Are you sure you want to delete?';
                                                    confirmDelete($title, $text);

                                                @endphp
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                            <div class="my-2">
                                {{ $agendas->links() }}
                            </div>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- end card-->
    </div>
@endsection
