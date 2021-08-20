<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventMemberRequest;
use App\Model\EventMember;
use Illuminate\Http\Request;

class EventMemberController extends Controller
{
    public function index(Request $request)
    {
        // ambil berdasarkan parameter
        $id  = $request->input('id');
        $name  = $request->input('name');

        if ($id) {
            $data = EventMember::find($id);

            // mengecek masukan
            if ($data) {
                return ResponseFormatter::success($data, 'Berhasil');
            } else {
                return ResponseFormatter::error(null, 'Gagal', 404);
            }
        } else if ($name) {
            $data = EventMember::where('name', 'like', '%' . $name . '%')
                ->get();

            if ($data) {
                return ResponseFormatter::success($data, 'Berhasil');
            } else {
                return ResponseFormatter::error(null, 'Gagal', 404);
            }
        } else {
            $data = EventMember::all();

            // mengecek masukan
            if ($data) {
                return ResponseFormatter::success($data, 'Berhasil');
            } else {
                return ResponseFormatter::error(null, 'Gagal', 404);
            }
        }
    }

    public function create(EventMemberRequest $request)
    {
        $data = new EventMember();
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->description = $request->description;

        $data->save();

        if ($data) {
            // data sengaja dikasih null karena sesudah POST langsung msk DB
            return ResponseFormatter::success($data = null, 'Berhasil masukan data');
        } else {
            return ResponseFormatter::error(null, 'Gagal', 404);
        }
    }

    public function update(EventMemberRequest $request, $id)
    {
        $name = $request->name;
        $phone = $request->phone;
        $email = $request->email;
        $address = $request->address;
        $description = $request->description;

        $data = EventMember::find($id);

        if ($data) {
            $data->name = $name;
            $data->phone = $phone;
            $data->email = $email;
            $data->address = $address;
            $data->description = $description;

            $data->save();

            return ResponseFormatter::success($data = null, 'Berhasil update data');
        } else {
            return ResponseFormatter::error(null, 'Gagal', 404);
        }
    }

    public function delete($id)
    {
        $data = EventMember::find($id);

        if ($data) {
            $data->delete();
            return ResponseFormatter::success($data = null, 'Berhasil delete data');
        } else {
            return ResponseFormatter::error(null, 'Gagal', 404);
        }
    }
}
