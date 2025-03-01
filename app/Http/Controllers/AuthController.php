<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

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

            $rules = [
                'password_lama' => 'required',
                'password' => 'required',
                'konfirmasi_password' => 'required',
            ];

            $user = Auth::user();

            // cek jika email berubah
            if ($request->email != $user->email) {
                // cek apakah email sudah ada
                $rules['email'] = 'required|email|unique:users';
            }

            if ($request->password_lama) {
                // cek apakah password lama cocok dengan password di database 
                if (!Hash::check($request->password_lama, $user->password)) {
                    return back()->with(['error' => 'Password Lama Salah']);
                }


            }
            if ($request->password_lama != $request->konfirmasi_password) {
                return back()->with(['error' => 'Password Kofirmasi Tidak Cocok']);
            }

            $validatedData = $request->validate($rules);

            $validatedData['password'] = Hash::make($validatedData['password']);

            dd($validatedData);

        } catch (\Throwable $th) {

            DB::rollBack();
            return back()->with([
                'error' => $th->getMessage()
            ]);
        }
    }
}
