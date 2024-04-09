<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller
{
    public function beranda(){
        if(Auth::check()){
            $influencer = User::with('relasi_medsos')->where('tipe_akun', '=', 'influencer')->get();
        }else{
            $influencer = User::with('relasi_medsos')->where('tipe_akun', '=', 'influencer')->get()->take(4);
        }
        return view('Front.beranda', compact('influencer'));
    }
}
