<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PesertaSgsRequest;
use App\Model\PesertaSgs;
use Illuminate\Http\Request;

class PesertaSgsController extends Controller
{
    public function index(Request $request)
    {
        // ambil berdasarkan parameter
        $id  = $request->input('id');

        if ($id) {
            $data = PesertaSgs::find($id);
            if ($data) {
                return ResponseFormatter::success($data, 'Berhasil');
            } else {
                return ResponseFormatter::error(null, 'Gagal', 404);
            }
        } else {
            $data = PesertaSgs::all();

            if ($data) { 
                return ResponseFormatter::success($data, 'Berhasil');
            } else {
                return ResponseFormatter::error(null, 'Gagal', 404);
            }
        }
    }

    public function create(PesertaSgsRequest $request) 
    {
        $data = new PesertaSgs();
        $data->nama = $request->nama;
        $data->phone = $request->phone; 
        $data->email = $request->email;
        $data->alamat = $request->alamat;
        $data->universitas = $request->universitas;
        $data->jurusan = $request->jurusan;
        $data->DOB = $request->DOB;
        $data->save();

        if ($data) {
            // data sengaja dikasih null karena sesudah POST langsung msk DB
            return ResponseFormatter::success($data = null, 'Berhasil masukan data');
        } else {
            return ResponseFormatter::error(null, 'Gagal', 404);
        }
    }

    public function update(PesertaSgsRequest $request, $id)
    {
        $nama = $request->nama;
        $phone = $request->phone; 
        $email = $request->email;
        $alamat = $request->alamat;
        $universitas = $request->universitas;
        $jurusan = $request->jurusan;
        $DOB = $request->DOB;

        $data = PesertaSgs::find($id);

        if ($data) {
            // kalau ada data baru eksekusi
            $data->nama = $nama;
            $data->phone = $phone; 
            $data->email = $email;
            $data->alamat = $alamat;
            $data->universitas = $universitas;
            $data->jurusan = $jurusan;
            $data->DOB = $DOB;

            $data->save();
            return ResponseFormatter::success($data = null, 'Berhasil update data');
        } else {
            return ResponseFormatter::error(null, 'Gagal', 404);
        }
    }

    public function delete($id)
    {
        $data = PesertaSgs::find($id);

        if ($data) {
            $data->delete();
            return ResponseFormatter::success($data = null, 'Berhasil delete data');
        } else {
            return ResponseFormatter::error(null, 'Gagal', 404);
        }
    }
}
