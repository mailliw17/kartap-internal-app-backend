<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\SgsRegisteredRequest;
use App\Model\SgsRegistered;
use Illuminate\Http\Request;

class SgsRegisteredController extends Controller
{
    public function index(Request $request)
    {
        $id  = $request->input('id');

        if ($id) {
            $data = SgsRegistered::find($id);

            if ($data) {
                return ResponseFormatter::success($data, 'Berhasil');
            } else {
                return ResponseFormatter::error(null, 'Gagal', 404);
            }
        } else {
            $data = SgsRegistered::all();

            if ($data) {
                return ResponseFormatter::success($data, 'Berhasil');
            } else {
                return ResponseFormatter::error(null, 'Gagal', 404);
            }
        }
    } 

    public function create(SgsRegisteredRequest $request)
    {
        $data = new SgsRegistered;
        $data->id_peserta_1 = $request->id_peserta_1;
        $data->id_peserta_2 = $request->id_peserta_2;
        $data->total_payment = $request->total_payment;
        $data->status = $request->status;
        $data->date_paid = $request->date_paid;

        $data->save();

        if ($data) {
            return ResponseFormatter::success($data = null, 'Berhasil masukan data');
        } else {
            return ResponseFormatter::error(null, 'Gagal', 404);
        }
    }
}
