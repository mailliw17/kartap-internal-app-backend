<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\Career;
use App\Http\Requests\CareerRequest;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index(Request $request)
    {
        // ambil berdasarkan parameter
        $id_career  = $request->input('id_career');
        $position  = $request->input('position');
        $department  = $request->input('department');

        if ($id_career) {
            $data = Career::where('id_career', $id_career)
                ->get();

            // mengecek masukan
            if ($id_career) {
                return ResponseFormatter::success($data, 'Berhasil');
            } else {
                return ResponseFormatter::error(null, 'Gagal', 404);
            }
        }

        if ($position) {
            $data = Career::where('position', 'like', '%' . $position . '%')
                ->get();

            if ($position) {
                return ResponseFormatter::success($data, 'Berhasil');
            } else {
                return ResponseFormatter::error(null, 'Gagal', 404);
            }
        }

        if ($department) {
            $data = Career::where('department', $department)
                ->get();

            if ($department) {
                return ResponseFormatter::success($data, 'Berhasil');
            } else {
                return ResponseFormatter::error(null, 'Gagal', 404);
            }
        }
    }

    public function create(CareerRequest $request)
    {
        $data = new Career();
        $data->id_career = $request->id_career;
        $data->position = $request->position;
        $data->department = $request->department;
        $data->job_desc = $request->job_desc;
        $data->req = $request->req;

        $data->save();

        if ($data) {
            // data sengaja dikasih null karena sesudah POST langsung msk DB
            return ResponseFormatter::success($data = null, 'Berhasil masukan data');
        } else {
            return ResponseFormatter::error(null, 'Gagal', 404);
        }
    }


    // error ketika panggil fungsi ini
    // karena yang dicari itu kolom id_career, laravel masih stick menggunakan kolom id
    public function update(CareerRequest $request, $id_career)
    {
        $id_career = $request->id_career;
        $position = $request->position;
        $department = $request->department;
        $job_desc = $request->job_desc;
        $req = $request->req;

        $data = Career::find('id_career', $id_career)->firstOrFail();
        dd($data);
        $data->id_career = $id_career;
        $data->position = $position;
        $data->department = $department;
        $data->job_desc = $job_desc;
        $data->req = $req;

        $data->save();

        if ($data) {
            // data sengaja dikasih null karena sesudah POST langsung msk DB
            return ResponseFormatter::success($data = null, 'Berhasil update data');
        } else {
            return ResponseFormatter::error(null, 'Gagal', 404);
        }
    }
}
