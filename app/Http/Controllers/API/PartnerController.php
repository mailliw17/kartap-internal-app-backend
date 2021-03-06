<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PartnerRequest;
use App\Model\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index(Request $request)
    {
        // ambil berdasarkan parameter
        $id  = $request->input('id');
        $name  = $request->input('name');

        if ($id) {
            $data = Partner::find($id);
            if ($data) {
                return ResponseFormatter::success($data, 'Berhasil');
            } else {
                return ResponseFormatter::error(null, 'Gagal', 404);
            }
        } else if ($name) {
            $data = Partner::where('name', $name)->get();
            if ($data) {
                return ResponseFormatter::success($data, 'Berhasil');
            } else {
                return ResponseFormatter::error(null, 'Gagal', 404);
            }
        } else {
            $data = Partner::all();

            if ($data) {
                return ResponseFormatter::success($data, 'Berhasil');
            } else {
                return ResponseFormatter::error(null, 'Gagal', 404);
            }
        }
    }

    public function create(PartnerRequest $request)
    {
        $data = new Partner();
        $data->name = $request->name;
        $data->description = $request->description;
        $data->startDate = $request->startDate;
        $data->endDate = $request->endDate;
        $data->status = $request->status;

        $data->save();

        if ($data) {
            // data sengaja dikasih null karena sesudah POST langsung msk DB
            return ResponseFormatter::success($data = null, 'Berhasil masukan data');
        } else {
            return ResponseFormatter::error(null, 'Gagal', 404);
        }
    }

    public function update(PartnerRequest $request, $id)
    {
        $name = $request->name;
        $description = $request->description;
        $startDate = $request->startDate;
        $endDate = $request->endDate;
        $status = $request->status;

        $data = Partner::find($id);

        if ($data) {
            $data->name = $name;
            $data->description = $description;
            $data->startDate = $startDate;
            $data->endDate = $endDate;
            $data->status = $status;

            $data->save();

            return ResponseFormatter::success($data = null, 'Berhasil update data');
        } else {
            return ResponseFormatter::error(null, 'Gagal', 404);
        }
    }

    public function delete($id)
    {
        $data = Partner::find($id);

        if ($data) {
            $data->delete();
            return ResponseFormatter::success($data = null, 'Berhasil delete data');
        } else {
            return ResponseFormatter::error(null, 'Gagal', 404);
        }
    }
}
