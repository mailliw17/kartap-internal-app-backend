<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\TestimonyRequest;
use App\Model\Testimony;
use Illuminate\Http\Request;

class TestimonyController extends Controller
{
    public function index(Request $request)
    {
        // ambil berdasarkan parameter
        $id  = $request->input('id');

        if ($id) {
            $data = Testimony::find($id);
            if ($data) {
                return ResponseFormatter::success($data, 'Berhasil');
            } else {
                return ResponseFormatter::error(null, 'Gagal', 404);
            }
        } else {
            $data = Testimony::all();

            if ($data) {
                return ResponseFormatter::success($data, 'Berhasil');
            } else {
                return ResponseFormatter::error(null, 'Gagal', 404);
            }
        }
    }

    public function create(TestimonyRequest $request)
    {
        $data = new Testimony();
        $data->idEventMember = $request->idEventMember;
        $data->event_id = $request->event_id;
        $data->testimony = $request->testimony;
        $data->feedback = $request->feedback;
        $data->status = $request->status;
        $data->save();

        if ($data) {
            // data sengaja dikasih null karena sesudah POST langsung msk DB
            return ResponseFormatter::success($data = null, 'Berhasil masukan data');
        } else {
            return ResponseFormatter::error(null, 'Gagal', 404);
        }
    }

    public function update(TestimonyRequest $request, $id)
    {
        $idEventMember = $request->idEventMember;
        $event_id = $request->event_id;
        $testimony = $request->testimony;
        $feedback = $request->feedback;
        $status = $request->status;

        $data = Testimony::find($id);

        if ($data) {
            // kalau ada data baru eksekusi
            $data->idEventMember = $idEventMember;
            $data->event_id = $event_id;
            $data->testimony = $testimony;
            $data->feedback = $feedback;
            $data->status = $status;

            $data->save();
            return ResponseFormatter::success($data = null, 'Berhasil update data');
        } else {
            return ResponseFormatter::error(null, 'Gagal', 404);
        }
    }

    public function delete($id)
    {
        $data = Testimony::find($id);


        if ($data) {
            $data->delete();
            return ResponseFormatter::success($data = null, 'Berhasil delete data');
        } else {
            return ResponseFormatter::error(null, 'Gagal', 404);
        }
    }
}
