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
        $id  = $request->input('id');
        $position  = $request->input('position');
        $department  = $request->input('department');

        if ($id) {
            $data = Career::findOrFail($id);

            // mengecek masukan
            if ($data) {
                return ResponseFormatter::success($data, 'Berhasil');
            } else {
                return ResponseFormatter::error(null, 'Gagal', 404);
            }
        } else if ($position) {
            $data = Career::where('position', 'like', '%' . $position . '%')
                ->get();

            if ($position) {
                return ResponseFormatter::success($data, 'Berhasil');
            } else {
                return ResponseFormatter::error(null, 'Gagal', 404);
            }
        } else {
            $data = Career::all();

            // mengecek masukan
            if ($data) {
                return ResponseFormatter::success($data, 'Berhasil');
            } else {
                return ResponseFormatter::error(null, 'Gagal', 404);
            }
        }
    }

    public function create(CareerRequest $request)
    {
        $data = new Career();
        $data->idDepartment = $request->idDepartment;
        $data->requestNumber = $request->requestNumber;
        $data->position = $request->position;
        $data->jobDescription = $request->jobDescription;
        $data->requirement = $request->requirement;
        $data->description = $request->description;
        $data->applyUrl = $request->applyUrl;
        $data->vacancies = $request->vacancies;
        $data->period = $request->period;
        $data->status = $request->status;

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
    public function update(CareerRequest $request, $id)
    {
        $idDepartment = $request->idDepartment;
        $requestNumber = $request->requestNumber;
        $position = $request->position;
        $jobDescription = $request->jobDescription;
        $requirement = $request->requirement;
        $description = $request->description;
        $applyUrl = $request->applyUrl;
        $vacancies = $request->vacancies;
        $period = $request->period;
        $status = $request->status;

        $data = Career::findOrFail($id);

        $data->idDepartment = $idDepartment;
        $data->requestNumber = $requestNumber;
        $data->position = $position;
        $data->jobDescription = $jobDescription;
        $data->requirement = $requirement;
        $data->description = $description;
        $data->applyUrl = $applyUrl;
        $data->vacancies = $vacancies;
        $data->period = $period;
        $data->status = $status;

        $data->save();

        if ($data) {
            // data sengaja dikasih null karena sesudah POST langsung msk DB
            return ResponseFormatter::success($data = null, 'Berhasil update data');
        } else {
            return ResponseFormatter::error(null, 'Gagal', 404);
        }
    }

    public function delete($id)
    {
        $data = Career::findOrFail($id);
        $data->delete();

        if ($data) {
            // data sengaja dikasih null karena sesudah POST langsung msk DB
            return ResponseFormatter::success($data = null, 'Berhasil delete data');
        } else {
            return ResponseFormatter::error(null, 'Gagal', 404);
        }
    }
}
