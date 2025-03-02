<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function authenticate(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);

            // dd($credentials);

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('dashboard');
            }

            return back()->with([
                'error' => 'Email atau password salah'
            ]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    public function Logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }


    public function resetPassword(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            // Definisi aturan validasi
            $rules = [
                'password_lama' => 'required',
                'password' => [
                    'required',
                    'min:8',
                    'regex:/^(?=.*[A-Z])(?=.*\d).+$/'
                ],
                'konfirmasi_password' => 'required|same:password',
            ];

            $messages = [
                'password.regex' => 'Password harus mengandung minimal satu huruf kapital dan satu angka.',
                'konfirmasi_password.same' => 'Konfirmasi password harus sama dengan password baru.'
            ];

            // Proses validasi
            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return response()->json([
                    'errors' => $validator->errors()
                ], 400);
            }

            $user = Auth::user();

            // Cek apakah email berubah
            if ($request->email != $user->email) {
                if (User::where('email', $request->email)->exists()) {
                    return response()->json(['errors' => ['email' => 'Email sudah digunakan']], 400);
                }
            }

            // Cek password lama
            if (!Hash::check($request->password_lama, $user->password)) {
                return response()->json(['errors' => ['password_lama' => 'Password Lama Tidak Cocok']], 400);
            }

            // Update password
            $user->update([
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            if (Auth::user()->id == $user->id) {
                // Jika pengguna mengganti password sendiri, logout dan suruh login ulang
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                DB::commit();
                return response()->json(data: ['success' => 'Password berhasil diubah! Silakan login kembali.']);
            }

        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }
}
