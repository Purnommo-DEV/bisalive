<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function beranda(){
        $influencer = User::with('relasi_medsos')->where('tipe_akun', '=', 'influencer')->get();
        return view('Front.beranda', compact('influencer'));
    }
}
