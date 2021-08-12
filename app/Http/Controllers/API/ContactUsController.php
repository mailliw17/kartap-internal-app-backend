<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ContactUs;
use App\Http\Requests\ContactUsRequest;

class ContactUsController extends Controller
{
    public function index(Request $request)
    {
        $id  = $request->input('id');

        if ($id) {
            $data = ContactUs::find($id);

            if ($data) {
                return ResponseFormatter::success($data, 'Berhasil');
            } else {
                return ResponseFormatter::error(null, 'Gagal', 404);
            }
        } else {
            $data = ContactUs::all();

            if ($data) {
                return ResponseFormatter::success($data, 'Berhasil');
            } else {
                return ResponseFormatter::error(null, 'Gagal', 404);
            }
        }
    }

    public function create(ContactUsRequest $request)
    {
        $data = new ContactUs;
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->description = $request->description;

        $data->save();

        if ($data) {
            // data sengaja dikasih null karena sesudah POST langsung msk DB
            return ResponseFormatter::success($data = null, 'Berhasil masukan data');
        } else {
            return ResponseFormatter::error(null, 'Gagal', 404);
        }
    }
}
