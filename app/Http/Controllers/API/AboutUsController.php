<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\AboutUs;
use App\Http\Requests\AboutUsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutUsController extends Controller
{
    // tetap pake Request biasa, jgn pake AboutUsRequest
    public function index(Request $request)
    {
        // ambil berdasarkan language
        $lang  = $request->input('lang');
        $id  = $request->input('id');

        if ($lang) {
            $data = AboutUs::where('lang', $lang)
                ->first();

            if ($data) {
                return ResponseFormatter::success($data, 'Berhasil');
            } else {
                return ResponseFormatter::error(null, 'Gagal', 404);
            }
        } else if ($id) {
            $data = AboutUs::find($id);

            if ($data) {
                return ResponseFormatter::success($data, 'Berhasil');
            } else {
                return ResponseFormatter::error(null, 'Gagal', 404);
            }
        } else {
            $data = AboutUs::all();

            if ($data) {
                return ResponseFormatter::success($data, 'Berhasil');
            } else {
                return ResponseFormatter::error(null, 'Gagal', 404);
            }
        }
    }

    public function create(AboutUsRequest $request)
    {
        $data = new AboutUs;
        $data->our_history = $request->our_history;
        $data->our_mission = $request->our_mission;
        $data->our_vision = $request->our_vision;
        $data->lang = $request->lang;

        $data->save();

        if ($data) {
            // data sengaja dikasih null karena sesudah POST langsung msk DB
            return ResponseFormatter::success($data = null, 'Berhasil masukan data');
        } else {
            return ResponseFormatter::error(null, 'Gagal', 404);
        }
    }

    public function update(AboutUsRequest $request, $id)
    {
        $our_history = $request->our_history;
        $our_mission = $request->our_mission;
        $our_vision = $request->our_vision;
        $lang = $request->lang;

        $data = AboutUs::find($id);


        if ($data) {
            $data->our_history = $our_history;
            $data->our_mission = $our_mission;
            $data->our_vision = $our_vision;
            $data->lang = $lang;

            $data->save();
            return ResponseFormatter::success($data = null, 'Berhasil update data');
        } else {
            return ResponseFormatter::error(null, 'Gagal', 404);
        }
    }

    public function delete($id)
    {
        $data = AboutUs::find($id);


        if ($data) {
            $data->delete();
            return ResponseFormatter::success($data = null, 'Berhasil delete data');
        } else {
            return ResponseFormatter::error(null, 'Gagal', 404);
        }
    }
}
