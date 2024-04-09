<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use App\Models\MedsosUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Drivers\Gd\Driver;

class ProfilPendaftarController extends Controller
{
    public function profil(){
        $profil = User::with('relasi_medsos')->where('id', Auth::user()->id)->first();
        return view('Front.profil', compact('profil'));
    }

    public function proses_edit_profil(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email'   =>  'required',
            'no_hp' => 'required',
            'umur' => 'required|max:16',
            'lokasi_live' => 'required',
            'medsos.*' => 'required',
            'pengikut.*' => 'required',
            'medsos_edit.*' => 'required',
            'pengikut_edit.*' => 'required',
            'path_foto' => 'mimes:jpg,jpeg,png|max:1000',
        ], [
            'nama.required' => 'Wajib diisi',
            'email.required' => 'Wajib diisi',
            'email.unique' => 'Kode ini telah terdaftar',
            'no_hp.required' => 'Wajib diisi',
            'umur.required' => 'Wajib diisi',
            'lokasi_live.required' => 'Wajib diisi',
            'medsos.*.required' => 'Wajib diisi',
            'pengikut.*.required' => 'Wajib diisi',
            'medsos_edit.*.required' => 'Wajib diisi',
            'pengikut_edit.*.required' => 'Wajib diisi',
            'path_foto.mimes' => 'Format yang diizinkan (jpg, jpeg dan png)',
            'path_foto.max' => 'Maksimal gambar 1MB (1024KB)',
        ]);

        if (!$validator->passes()) {
            return response()->json([
                'status_form_kosong' => 1,
                'error' => $validator->errors()->toArray()
            ]);
        } else {
            $user = User::where('id',  Auth::user()->id)->first();
            if ($request->hasFile('path_foto')) {

                $path_foto = 'storage/' . $user->path_foto;
                if (File::exists($path_foto)) {
                    File::delete($path_foto);
                }

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
                $url_foto = 'foto/'.$filename;
            }
            $user->update(
                [
                    'nama' => $request->nama,
                    'email' => $request->email,
                    'no_hp' => $request->no_hp,
                    'umur' => $request->umur,
                    'lokasi_live' => $request->lokasi_live,
                    'path_foto' => $url_foto ?? $user->path_foto
                ]
            );

            foreach ($request->input('medsos_old_id') as $key => $email) {
                $data = MedsosUsers::where('id', $request->input('medsos_old_id')[$key])->first();
                $user_medsos = MedsosUsers::where([['users_id', Auth::user()->id], ['medsos', $request->input('medsos')[$key]]])->first();
                if($user_medsos == null){
                    $data->update([
                        'medsos' => $request->input('medsos')[$key],
                        'pengikut' => $request->input('pengikut')[$key]
                    ]);
                }else{
                    $data->update([
                        'pengikut' => $request->input('pengikut')[$key]
                    ]);
                }
            }

            if ($request->input('medsos_edit')) {
                $var_medsos = $request->input('medsos_edit');
                $var_pengikut = $request->input('pengikut_edit');
                for ($x = 0; $x < count($var_medsos); $x++) {
                    $user_medsos = MedsosUsers::where([['users_id', Auth::user()->id], ['medsos', $var_medsos[$x]]])->first();
                    $tampung_medsos = $var_medsos[$x];
                    $tampung_pengikut = $var_pengikut[$x];
                    if($user_medsos == null){
                        MedsosUsers::create([
                            'users_id' => Auth::user()->id,
                            'medsos' => $tampung_medsos,
                            'pengikut' => $tampung_pengikut
                        ]);
                    }
                }
            }

            return response()->json([
                'status_berhasil' => 1,
                'msg' => 'Data Berhasil di Ubah'
            ]);
        }
    }

    public function proses_hapus_medsos($id){
        $medsos = MedsosUsers::find($id);
        $medsos->delete();
        return response()->json([
            'status_berhasil' => 1,
            'msg' => 'Data Berhasil di Hapus'
        ]);
    }
}
