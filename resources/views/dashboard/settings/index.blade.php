@extends('dashboard.layouts.main')

@section('main')
    <div class="w-full flex gap-2 flex-col">
        <div class="card ">
            <div class="card-header">
                <div class="flex justify-between items-center">
                    <h4 class="card-title font-nunito">Setting Logo & title Depan</h4>
                    @if ($settingsFront)
                        <div>
                            <a data-confirm-delete="true" href="{{ route('dashboard.settings.delete', $settingsFront->id) }}"
                                class="relative group text-red-500 hover:text-red-600">
                                <i class="uil uil-trash-alt text-lg"></i>
                                <span
                                    class="absolute w-[100px] -top-7 left-1/2 -translate-x-1/2 scale-0 group-hover:scale-100 transition-transform bg-gray-800 text-white text-xs rounded-md py-1 px-2">
                                    Hapus data Fron
                                </span>
                            </a>
                            @php
                                $title = 'Delete Data Front';
                                $text = 'Are you sure you want to delete?';
                                confirmDelete($title, $text);

                            @endphp
                        </div>
                    @endif
                </div>

                <hr class="my-4">
                <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-1">
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
                                title: 'error!',
                                text: "{{ session('error') }}",
                            });
                        </script>
                    @endif
                    <div>
                        <form
                            action="{{ $settingsFront ? route('dashboard.settings.update', $settingsFront->id) : route('dashboard.settings.add') }}"
                            method="post" enctype="multipart/form-data">
                            @method($settingsFront ? 'PUT' : 'POST')
                            @csrf


                            @if ($settingsFront)
                                <input type="hidden" value="{{ $settingsFront->image_header ?? '' }}"
                                    name="image_old_header" id="">
                                <input type="hidden" value="{{ $settingsFront->image_footer ?? '' }}"
                                    name="image_old_footer" id="">
                            @endif
                            <div class="mb-3">
                                <label for="title" class="text-gray-800 text-sm font-medium inline-block mb-2">
                                    Title</label>
                                <input type="text" id="title" name="title" required
                                    value="{{ $settingsFront->title ?? '' }}"
                                    class="form-input @error('title') border-red-500   
                            @enderror"
                                    autofocus>
                                @error('title')
                                    <p class="text-red-500 text-[12px] font-nunito">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="image" class="text-gray-800 text-sm font-medium inline-block mb-2">Gambar
                                    Header</label>
                                <label for="image" class="sr-only">Choose file</label>
                                <input type="file" name="image_header" id="image"
                                    class="block w-full border border-gray-200 shadow-sm rounded-md
                            text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 
                            disabled:opacity-50 disabled:pointer-events-none
                             
                          file:bg-gray-50 file:border-0
                          file:me-4
                          file:py-2 file:px-4
                          ">
                            </div>
                            <div class="mb-3">
                                <label for="image" class="text-gray-800 text-sm font-medium inline-block mb-2">Gambar
                                    Footer</label>
                                <label for="image" class="sr-only">Choose file</label>
                                <input type="file" name="image_footer" id="image_footer"
                                    class="block w-full border border-gray-200 shadow-sm rounded-md
                            text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 
                            disabled:opacity-50 disabled:pointer-events-none
                             
                          file:bg-gray-50 file:border-0
                          file:me-4
                          file:py-2 file:px-4
                          ">
                            </div>
                            <div class="mb-3">
                                <label for="title" class="text-gray-800 text-sm font-medium flex gap-2 mb-2">
                                    Width <p class="text-gray-500 text-[10px]">* px</p></label>
                                <input type="number" id="width" name="width" required
                                    value="{{ $settingsFront->width ?? '' }}" placeholder="Masukkan angka contoh 32"
                                    class="form-input @error('width') border-red-500   
                            @enderror"
                                    autofocus>
                                @error('width')
                                    <p class="text-red-500 text-[12px] font-nunito">{{ $message }}</p>
                                @enderror

                            </div>
                            <div class="mb-3">
                                <button type="submit"
                                    class=" py-1 px-2 bg-cyan-500 !text-sm text-white hover:bg-cyan-600 active:bg-cyan-400 cursor-pointer rounded-sm ">{{ $settingsFront ? 'Update' : 'Simpan' }}</button>
                            </div>
                        </form>
                    </div>
                    @if ($settingsFront)
                        <div class="flex flex-col lg:border-l-2 lg:border-b-0 border-b-2 border-gray-200 p-3 lg:ml-3">
                            <h1 class="font-neutrif font-semibold text-lg mb-3">Data Front</h1>
                            <div class="flex flex-col gap-2">
                                <p class="uppercase font-neutrif text-sm">title : {{ $settingsFront->title }}</p>

                                <label for="">Gambar Header</label>
                                @if ($settingsFront->image_header)
                                    <img src="{{ Storage::url($settingsFront->image_header) }}"
                                        alt="{{ $settingsFront->title }}">
                                @endif
                                <label for="">Gambar Footer</label>
                                @if ($settingsFront->image_footer)
                                    <img src="{{ Storage::url($settingsFront->image_footer) }}"
                                        alt="{{ $settingsFront->title }}">
                                @endif
                                <p class="uppercase font-neutrif text-sm">Width : {{ $settingsFront->width }}px</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="flex flex-col">
                    <h4 class="card-title font-nunito">Settigs Account</h4>
                    <hr class="my-4">
                    @include('public.components.settings.settting-account')
                </div>
            </div>
        </div>
    </div>
@endsection
