<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CareerMemberRequest;
use App\Model\CareerMember;
use Illuminate\Http\Request;

class CareerMemberController extends Controller
{
    public function index(Request $request)
    {
        // ambil berdasarkan parameter
        $id  = $request->input('id');

        if ($id) {
            $data = CareerMember::find($id);

            if ($data) {
                return ResponseFormatter::success($data, 'Berhasil');
            } else {
                return ResponseFormatter::error(null, 'Gagal', 404);
            }
        } else {
            $data = CareerMember::all();

            if ($data) {
                return ResponseFormatter::success($data, 'Berhasil');
            } else {
                return ResponseFormatter::error(null, 'Gagal', 404);
            }
        }
    }

    public function create(CareerMemberRequest $request)
    {
        $data = new CareerMember();
        $data->idCareer = $request->idCareer;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->cv_or_resume = $request->cv_or_resume;
        $data->linkedin = $request->linkedin;
        $data->socialMedia = $request->socialMedia;
        $data->status = $request->status;
        $data->save();

        if ($data) {
            // data sengaja dikasih null karena sesudah POST langsung msk DB
            return ResponseFormatter::success($data = null, 'Berhasil masukan data');
        } else {
            return ResponseFormatter::error(null, 'Gagal', 404);
        }
    }

    public function update(CareerMemberRequest $request, $id)
    {
        $idCareer = $request->idCareer;
        $name = $request->name;
        $email = $request->email;
        $cv_or_resume = $request->cv_or_resume;
        $linkedin = $request->linkedin;
        $socialMedia = $request->socialMedia;
        $status = $request->status;

        $data = CareerMember::find($id);


        if ($data) {
            $data->idCareer = $idCareer;
            $data->name = $name;
            $data->email = $email;
            $data->cv_or_resume = $cv_or_resume;
            $data->linkedin = $linkedin;
            $data->socialMedia = $socialMedia;
            $data->status = $status;

            $data->save();
            return ResponseFormatter::success($data = null, 'Berhasil update data');
        } else {
            return ResponseFormatter::error(null, 'Gagal', 404);
        }
    }

    public function delete($id)
    {
        $data = CareerMember::find($id);


        if ($data) {
            $data->delete();

            return ResponseFormatter::success($data = null, 'Berhasil delete data');
        } else {
            return ResponseFormatter::error(null, 'Gagal', 404);
        }
    }
}
