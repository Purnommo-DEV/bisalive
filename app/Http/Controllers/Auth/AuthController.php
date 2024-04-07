<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function halaman_login()
    {
        return view('Auth.login');
    }

    public function proses_login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ], [
            'email.required' => 'Email Wajib diisi',
            'email.email' => 'Masukkan Email dengan benar',
            'password.required' => 'Password Wajib diisi',
            'password.min' => 'Minimal 8 karakter',
        ]);
        if (!$validator->passes()) {
            return response()->json([
                'status_form_kosong' => 1,
                'error' => $validator->errors()->toArray()
            ]);
        } else {
            if (Auth::attempt($request->only('email', 'password'))) {
                if (auth()->user()->role == '1') {
                    return response()->json([
                        'status_berhasil_login' => 1,
                        'msg' => 'Berhasil Login !',
                        'route' => route('admin.HalamanPendaftar')
                    ]);
                }
            }
            else if (Auth::attempt($request->only('email', 'password'))) {
                if (auth()->user()->role == '2') {
                    return response()->json([
                        'status_berhasil_login' => 1,
                        'msg' => 'Berhasil Login !',
                        'route' => route('Beranda')
                    ]);
                }
            }
            else if (Auth::attempt($request->only('email', 'password'))) {
                if (auth()->user()->role == '3') {
                    return response()->json([
                        'status_berhasil_login' => 1,
                        'msg' => 'Berhasil Login !',
                        'route' => route('Beranda')
                    ]);
                }
            }
            else {
                return response()->json([
                    'status_user_pass_salah' => 1,
                    'msg' => 'Login gagal, periksa kembali email dan password anda !',
                ]);
            }
        }
    }

    public function proses_logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('HalamanLogin');
    }
}
