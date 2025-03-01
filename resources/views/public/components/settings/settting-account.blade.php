<div class="grid grid-cols-1 gap-3">
    <form action="{{ route('dashboard.settings.resetPassword', auth()->user()->id) }}" method="POST">
        @method('PUT')
        @csrf


        {{-- Pesan Error di Atas Form --}}
        @if (session('error'))
            <div class="mb-3 p-3 bg-red-100 border border-red-400 text-red-700 rounded">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-3 p-3 bg-red-100 border border-red-400 text-red-700 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="mb-3">
            <label for="title" class="text-gray-800 text-sm font-medium inline-block mb-2">
                Email</label>
            <input type="email" id="email" name="email" required value="{{ auth()->user()->email }}"
                class="form-input @error('email') border-red-500   
        @enderror" autofocus>
            @error('email')
                <p class="text-red-500 text-[12px] font-nunito">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password_lama" class="text-gray-800 text-sm font-medium inline-block mb-2">
                Password Lama</label>
            <input type="password" id="password_lama" name="password_lama" required placeholder="Masukkan password lama"
                class="form-input @error('password_lama') border-red-500   
        @enderror" autofocus>
            @error('password_lama')
                <p class="text-red-500 text-[12px] font-nunito">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="text-gray-800 text-sm font-medium inline-block mb-2">
                Password Baru</label>
            <input type="password" id="password" name="password" required placeholder="Masukkan password lama"
                class="form-input @error('password') border-red-500   
        @enderror" autofocus>
            @error('password')
                <p class="text-red-500 text-[12px] font-nunito">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="konfirmasi_password" class="text-gray-800 text-sm font-medium inline-block mb-2">
                Konfirmasi Password</label>
            <input type="password" id="konfirmasi_password" name="konfirmasi_password" required
                placeholder="Masukkan konfirmasi password"
                class="form-input @error('konfirmasi_password') border-red-500   
        @enderror" autofocus>
            @error('konfirmasi_password')
                <p class="text-red-500 text-[12px] font-nunito">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit"
            class="py-1 px-2 bg-cyan-500 !text-sm text-white hover:bg-cyan-600 active:bg-cyan-400 cursor-pointer rounded-sm">Update</button>
    </form>
</div>
