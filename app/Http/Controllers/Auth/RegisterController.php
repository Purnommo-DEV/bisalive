<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\MedsosUsers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class RegisterController extends Controller
{
    public function halaman_register(){
        return view('Auth.register');
    }

    public function generateUniqueNumber()
    {
        do {
            $kode = random_int(10000000, 99999999);
        } while (User::where('kode', '=', $kode)->first());

        return $kode;
    }

    public function proses_register(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required',
                'email' => 'required|email|unique:users',
                'no_hp' => 'required|numeric|unique:users',
                'tipe_akun' => 'required',
                'password' => ['required', 'min:8', 'max:100']
            ],
            [
                'nama.required' => 'Wajib diisi',
                'email.required' => 'Wajib diisi',
                'email.email' => 'Harus berupa email @',
                'email.unique' => 'Email ini telah terdaftar',
                'no_hp.numeric' => 'Wajib berupa angka',
                'no_hp.required' => 'Wajib diisi',
                'no_hp.unique' => 'Nomor ini telah terdaftar',
                'tipe_akun.required' => 'Wajib diisi',
                'password.required' => 'Wajib diisi',
                'password.min' => 'Minimal Password 8 Karakter',
                'password.max' => 'Maksimal Password 100 Karakter'
            ],
        );
        if ($request->tipe_akun == 'influencer') {
            $validator = Validator::make(
                $request->all(),
                [
                    'nama' => 'required',
                    'email' => 'required|email|unique:users',
                    'no_hp' => 'required|numeric|unique:users',
                    'tipe_akun' => 'required',
                    'path_foto' => 'required|mimes:jpg,jpeg,png|max:1000',
                    'umur' => 'required|numeric',
                    'lokasi_live' => 'required',
                    'medsos' => 'required',
                    'pengikut' => 'required',
                    'path_bukti_bayar' => 'required|mimes:jpg,jpeg,png|max:1000',
                ],
                [
                    'nama.required' => 'Wajib diisi',
                    'email.required' => 'Wajib diisi',
                    'email.email' => 'Harus berupa email @',
                    'email.unique' => 'Email ini telah terdaftar',
                    'no_hp.numeric' => 'Wajib berupa angka',
                    'no_hp.required' => 'Wajib diisi',
                    'no_hp.unique' => 'Nomor ini telah terdaftar',
                    'tipe_akun.required' => 'Wajib diisi',
                    'path_foto.mimes' => 'Format yang diizinkan (jpg, jpeg dan png)',
                    'path_foto.max' => 'Maksimal gambar 1MB (1024KB)',
                    'umur.required' => 'Wajib diisi',
                    'umur.numeric' => 'Wajib berupa angka',
                    'lokasi_live.required' => 'Wajib diisi',
                    'medsos.required' => 'Wajib diisi',
                    'pengikut.required' => 'Wajib diisi',
                    'path_bukti_bayar.mimes' => 'Format yang diizinkan (jpg, jpeg dan png)',
                    'path_bukti_bayar.max' => 'Maksimal gambar 1MB (1024KB)',
                ],
            );
        }

        if (!$validator->passes()) {
            return response()->json([
                'status_form_kosong' => 1,
                'error' => $validator->errors()->toArray(),
            ]);
        } else {

            if ($request->hasFile('path_foto')) {

                $manager = new ImageManager(new Driver());
                $file_gambar = $manager->read($request->file('path_foto'));

                $gambar_w = getimagesize($request->file('path_foto'))[0];
                $gambar_h = getimagesize($request->file('path_foto'))[1];
                if($gambar_w != $gambar_h){
                    $crop_gambar = $file_gambar->coverDown(1200, 1200, 'center');
                }else{
                    $crop_gambar = $file_gambar;
                }
                $filename = hexdec(uniqid()).'.'.$request->file('path_foto')->getClientOriginalExtension();
                $crop_gambar->toJpeg(80)->save(base_path('public/storage/foto/'.$filename));
                $path_foto = 'foto/'.$filename;
            }

            if ($request->hasFile('path_bukti_bayar')) {
                $filenameWithExt = $request->file('path_bukti_bayar')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('path_bukti_bayar')->getClientOriginalExtension();
                $filenameSimpan = $filename . '_' . time() . '.' . $extension;
                $path_bukti_bayar = $request->file('path_bukti_bayar')->store('bukti_bayar', 'public');
            }

            $register_user = new User();
            $register_user->kode = $this->generateUniqueNumber();
            $register_user->nama = help_hapus_spesial_karakter($request->nama);
            $register_user->email = $request->email;
            $register_user->no_hp = help_hapus_spesial_karakter($request->no_hp);
            $register_user->tipe_akun = help_hapus_spesial_karakter($request->tipe_akun);
            $register_user->password = Hash::make($request->password);
            $register_user->status_verifikasi = 0;
            if($request->tipe_akun == 'customer'){
                $register_user->role = 2;
                $register_user->save();
            }
            if($request->tipe_akun == 'influencer'){
                $register_user->path_foto = $path_foto ?? null;
                $register_user->umur = help_hapus_spesial_karakter($request->umur);
                $register_user->lokasi_live = help_hapus_spesial_karakter($request->lokasi_live);
                $register_user->path_bukti_bayar = $path_bukti_bayar ?? null;
                $register_user->role = 3;
                $register_user->save();

                $request_medsos = $request->input('medsos');
                $request_pengikut = $request->input('pengikut');
                for ($x = 0; $x < count($request_medsos); $x++) {
                    $tampung_medsos = $request_medsos[$x];
                    $tampung_pengikut = $request_pengikut[$x];
                    MedsosUsers::create([
                        'users_id' => $register_user->id,
                        'medsos' => $tampung_medsos,
                        'pengikut' => $tampung_pengikut
                    ]);
                }
            }
            return response()->json([
                'status_berhasil' => 1,
                'msg' => 'Berhasil Mendaftar',
                'route' => route('HalamanLogin'),
            ]);
        }

    }
}
