<?php

namespace App\Http\Controllers\Back;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class PendaftarController extends Controller
{
    public function pendaftar(){
        return view('Back.Pendaftar.pendaftar');
    }

    public function data_pendaftar(Request $request, $jenis){
        $data = User::select(['users.*'])->where('tipe_akun', '=', $jenis)->orderBy('created_at', 'desc');
        $rekamFilter = $data->get()->count();
        if ($request->input('length') != -1) {
            $data = $data->skip($request->input('start'))->take($request->input('length'));
        }
        $rekamTotal = $data->count();
        $data = $data->get();
        return response()->json([
            'draw' => $request->input('draw'),
            'data' => $data,
            'recordsTotal' => $rekamTotal,
            'recordsFiltered' => $rekamFilter,
        ]);
    }

    public function konfirmasi_pengguna($id, $tipe){
        $data = User::where('id', $id)->first();
        if($tipe != "hapus"){
            if($tipe == "revisi"){
                $data->status_verifikasi = 0;
            }else if($tipe == "verifikasi"){
                $data->status_verifikasi = 1;
            }else if($tipe == "batalkan"){
                $data->status_verifikasi = 2;
            }
            $data->save();
        }else{
            $path_foto = 'storage/' . $data->path_foto;
            $path_bukti_bayar = 'storage/' . $data->path_bukti_bayar;
            if (File::exists($path_foto) || File::exists($path_bukti_bayar)) {
                File::delete($path_foto);
                File::delete($path_bukti_bayar);
            }
            $data->delete();
        }
        return response()->json([
            'status_berhasil' => 1,
            'msg' => 'Berhasil di'.$tipe
        ]);
    }
}
