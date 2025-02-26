@extends('dashboard.layouts.main')

@section('main')
    <div class="w-full">
        <div class="card overflow-hidden">
            <div class="card-header">
                <h4 class="card-title font-nunito">Setting Logo & title Depan</h4>
                <hr class="my-4">
                <div class="w-full grid grid-cols-1 lg:grid-cols-2">

                    <div>
                        <form action="" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="text-gray-800 text-sm font-medium inline-block mb-2">
                                    Title</label>
                                <input type="text" id="title" name="title" required
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
                            <div class="mb-3">
                                <label for="image" class="text-gray-800 text-sm font-medium inline-block mb-2">Gambar
                                    Footer</label>
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
                            <div class="mb-3">
                                <button type="submit"
                                    class=" py-1 px-2 bg-cyan-500 !text-sm text-white hover:bg-cyan-600 active:bg-cyan-400 cursor-pointer rounded-sm ">Simpan</button>
                            </div>
                        </form>
                    </div>
                    <div>
                        <img src="" alt="" width="53">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
