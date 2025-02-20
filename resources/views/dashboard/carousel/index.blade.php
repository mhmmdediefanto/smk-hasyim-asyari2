@extends('dashboard.layouts.main')

@section('main')
    <div class="w-full">
        <div class="card overflow-hidden">
            <div class="card-header flex justify-between items-center">
                <h4 class="card-title font-nunito">Data Carousel Manajement</h4>
                <!-- Modal toggle -->
                <button data-modal-target="tambahCarousel" data-modal-toggle="tambahCarousel"
                    class="block text-white bg-cyan-500 font-nunito
                     hover:bg-cyan-800 focus:ring-2 focus:outline-none focus:ring-cyan-300 font-medium rounded-lg text-[10px] px-2 py-1 lg:text-[12px]
                     text-center dark:bg-cyan-600 dark:hover:bg-cyan-700 dark:focus:ring-cyan-800"
                    type="button">
                    <i class="uil uil-plus"></i>
                    Tambah Carousel
                </button>

                {{-- modal create --}}
                @include('public.components.modal.modal-carousel', [
                    'modalId' => 'tambahCarousel',
                    'id' => '',
                    'modalMethod' => 'POST',
                    'modalRoute' => route('dashboard.carousel-management.store'),
                    'modalTitle' => 'Tambah Carousel',
                    'methodUpdate' => '',
                ])
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
                                    <th class="px-6 py-3 text-start">image </th>
                                    <th class="px-6 py-3 text-start">title</th>
                                    <th class="px-6 py-3 text-start">tagline</th>
                                    <th class="px-6 py-3 text-start">action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carousels as $carousel)
                                    <tr class="border-b border-gray-200">


                                        <td class="px-6 py-3"><img src="{{ asset('storage/' . $carousel->image) }}"
                                                class="w-16" alt="{{ $carousel->title }}"></td>
                                        <td class="px-6 py-3">{{ $carousel->title }}</td>
                                        <td class="px-6 py-3">{{ $carousel->tagline }}</td>
                                        <td class="px-6 py-3">
                                            <div class="flex items-center gap-3">
                                                <button data-modal-target="editCarousel}"
                                                    data-modal-toggle="editCarousel}"
                                                    class="relative group text-yellow-500 hover:text-yellow-600">
                                                    <i class="uil uil-file-edit-alt text-lg"></i>
                                                    <span
                                                        class="absolute -top-7 left-1/2 -translate-x-1/2 scale-0 group-hover:scale-100 transition-transform bg-gray-800 text-white text-xs rounded-md py-1 px-2">
                                                        Edit File
                                                    </span>

                                                </button>

                                                {{-- modal create --}}
                                                @include('public.components.modal.modal-carousel', [
                                                    'modalId' => 'editCarousel{{ $carousel->id }}',
                                                    'id' => "{{ $carousel->id }}",
                                                    'modalMethod' => 'POST',
                                                    'modalRoute' => route('dashboard.carousel-management.store'),
                                                    'modalTitle' => 'Tambah Carousel',
                                                    'methodUpdate' => 'PUT',
                                                ])

                                                <a data-confirm-delete="true"
                                                    href="{{ route('dashboard.carousel-management.delete', $carousel->id) }}"
                                                    class="relative group text-red-500 hover:text-red-600">
                                                    <i class="uil uil-trash-alt text-lg"></i>
                                                    <span
                                                        class="absolute -top-7 left-1/2 -translate-x-1/2 scale-0 group-hover:scale-100 transition-transform bg-gray-800 text-white text-xs rounded-md py-1 px-2">
                                                        Hapus File
                                                    </span>
                                                </a>
                                                @php
                                                    $title = 'Delete Carousel';
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
