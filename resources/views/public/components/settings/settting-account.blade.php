<div class="grid grid-cols-1 gap-3">
    <form id="resetPasswordForm" action="{{ route('dashboard.settings.resetPassword', auth()->user()->id) }}"
        method="POST">
        @csrf
        @method('PUT')

        <!-- Notifikasi Global -->
        <div id="errorContainer" class="mb-3 hidden p-3 bg-red-100 border border-red-400 text-red-700 rounded"></div>

        <!-- Email -->
        <div class="mb-3">
            <label class="text-gray-800 text-sm font-medium inline-block mb-2">Email</label>
            <input type="email" id="email" name="email" required value="{{ auth()->user()->email }}"
                class="form-input" autocomplete="email">
            <span class="text-red-500 text-sm error-message" id="error-email"></span>
        </div>

        <!-- Password Lama -->
        <div class="mb-3">
            <label class="text-gray-800 text-sm font-medium inline-block mb-2">Password Lama</label>
            <input type="password" id="password_lama" name="password_lama" required class="form-input"
                autocomplete="current-password">
            <span class="text-red-500 text-sm error-message" id="error-password_lama"></span>
        </div>

        <!-- Password Baru -->
        <div class="mb-3">
            <label class="text-gray-800 text-sm font-medium inline-block mb-2">Password Baru</label>
            <input type="password" id="password" name="password" required class="form-input"
                autocomplete="current-password">
            <span class="text-red-500 text-sm error-message" id="error-password"></span>
        </div>

        <!-- Konfirmasi Password -->
        <div class="mb-3">
            <label class="text-gray-800 text-sm font-medium inline-block mb-2">Konfirmasi Password</label>
            <input type="password" id="konfirmasi_password" name="konfirmasi_password" required class="form-input"
                autocomplete="current-password">
            <span class="text-red-500 text-sm error-message" id="error-konfirmasi_password"></span>
        </div>

        <!-- Tombol Submit dengan Loading -->
        <button id="submitBtn" type="submit"
            class="py-1 px-2 bg-cyan-500 text-white hover:bg-cyan-600 active:bg-cyan-400 cursor-pointer rounded-sm">
            <span id="btn-text">Update</span>
            <svg id="btn-loading" class="animate-spin h-5 w-5 text-white hidden" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                </circle>
                <path class="opacity-75" fill="currentColor"
                    d="M4 12a8 8 0 018-8v4l3-3-3-3v4a8 8 0 018 8h4l-3 3 3 3h-4a8 8 0 01-8 8v-4l-3 3 3 3v-4a8 8 0 01-8-8H1l3-3-3-3h4z">
                </path>
            </svg>
        </button>
    </form>
</div>
<script>
    $(document).ready(function() {
        $('#resetPasswordForm').submit(function(event) {
            event.preventDefault(); // Hindari reload halaman

            let form = $(this);
            let formData = form.serialize();
            let submitBtn = $('#submitBtn');
            $('#btn-text').hide();
            $('#btn-loading').removeClass('hidden');

            // Reset pesan error
            $('.error-message').text('');
            $('#errorContainer').hide().text('');

            $.ajax({
                url: form.attr('action'),
                type: 'PUT',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    Swal.fire({
                        icon: "success",
                        title: "Berhasil!",
                        text: response.success,
                        showConfirmButton: true,
                    }).then((result) => {
                        if (response.success.includes("login kembali")) {
                            window.location.href =
                            "/login"; // Arahkan ke halaman login
                        } else {
                            location.reload();
                        }
                    });
                },
                error: function(xhr) {
                    if (xhr.status === 400) {
                        let errors = xhr.responseJSON.errors;

                        console.log(errors);
                        
                        // Menampilkan error di masing-masing field
                        $.each(errors, function(key, value) {
                            $('#error-' + key).text(value[0]);
                        });

                        // Menampilkan notifikasi global
                        $('#errorContainer').show().text('Periksa kembali input Anda.');
                    }
                },
                complete: function() {
                    // Kembalikan tombol seperti semula setelah proses selesai
                    $('#btn-text').show();
                    $('#btn-loading').addClass('hidden');
                }
            });
        });
    });
</script>
