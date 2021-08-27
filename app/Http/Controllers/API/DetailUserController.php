<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\DetailUserRequest;
use App\Model\DetailUser;
use Illuminate\Http\Request;

class DetailUserController extends Controller
{
    public function index(Request $request)
    {
        // ambil berdasarkan parameter
        $id  = $request->input('id');
        $user_id  = $request->input('user_id');
        $department_id  = $request->input('department_id');
        $name  = $request->input('name');

        if ($id) {
            $data = DetailUser::find($id);
            if ($data) {
                return ResponseFormatter::success($data, 'Berhasil');
            } else {
                return ResponseFormatter::error(null, 'Gagal', 404);
            }
        } else if ($user_id) {
            $data = DetailUser::where('user_id', $user_id)->take(10)->get();
            if ($data) {
                return ResponseFormatter::success($data, 'Berhasil');
            } else {
                return ResponseFormatter::error(null, 'Gagal', 404);
            }
        } else if ($department_id) {
            $data = DetailUser::where('department_id', $department_id)->take(10)->get();
            if ($data) {
                return ResponseFormatter::success($data, 'Berhasil');
            } else {
                return ResponseFormatter::error(null, 'Gagal', 404);
            }
        } else if ($name) {
            $data = DetailUser::where('name', 'like', '%' . $name . '%')->take(10)->get();

            if ($data) {
                return ResponseFormatter::success($data, 'Berhasil');
            } else {
                return ResponseFormatter::error(null, 'Gagal', 404);
            }
        } else {
            $data = DetailUser::all();

            if ($data) {
                return ResponseFormatter::success($data, 'Berhasil');
            } else {
                return ResponseFormatter::error(null, 'Gagal', 404);
            }
        }
    }

    public function create(DetailUserRequest $request)
    {
        $data = new DetailUser();
        $data->user_id = $request->user_id;
        $data->department_id = $request->department_id;
        $data->name = $request->name;
        $data->address = $request->address;
        $data->dateOfBirth = $request->dateOfBirth;
        $data->photo = $request->photo;
        $data->linkedin = $request->linkedin;
        $data->position = $request->position;
        $data->status = $request->status;
        $data->save();

        if ($data) {
            // data sengaja dikasih null karena sesudah POST langsung msk DB
            return ResponseFormatter::success($data = null, 'Berhasil masukan data');
        } else {
            return ResponseFormatter::error(null, 'Gagal', 404);
        }
    }

    public function update(DetailUserRequest $request, $id)
    {
        $user_id = $request->user_id;
        $department_id = $request->department_id;
        $name = $request->name;
        $address = $request->address;
        $dateOfBirth = $request->dateOfBirth;
        $photo = $request->photo;
        $linkedin = $request->linkedin;
        $position = $request->position;
        $status = $request->status;

        $data = DetailUser::find($id);

        if ($data) {
            // kalau ada data baru eksekusi
            $data->user_id = $user_id;
            $data->department_id = $department_id;
            $data->name = $name;
            $data->address = $address;
            $data->dateOfBirth = $dateOfBirth;
            $data->photo = $photo;
            $data->linkedin = $linkedin;
            $data->position = $position;
            $data->status = $status;

            $data->save();
            return ResponseFormatter::success($data = null, 'Berhasil update data');
        } else {
            return ResponseFormatter::error(null, 'Gagal', 404);
        }
    }

    public function delete($id)
    {
        $data = DetailUser::find($id);

        if ($data) {
            $data->delete();
            return ResponseFormatter::success($data = null, 'Berhasil delete data');
        } else {
            return ResponseFormatter::error(null, 'Gagal', 404);
        }
    }
}
