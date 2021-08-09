<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Event;
use App\Http\Requests\CareerRequest;

class EventController extends Controller
{
    public function index(Request $request)
    {
        // ambil berdasarkan parameter
        $id  = $request->input('id');
        $title  = $request->input('title');

        if ($id) {
            $data = Event::findOrFail($id);

            // mengecek masukan
            if ($id) {
                return ResponseFormatter::success($data, 'Berhasil');
            } else {
                return ResponseFormatter::error(null, 'Gagal', 404);
            }
        }

        if ($title) {
            $data = Event::where('title', 'like', '%' . $title . '%')
                ->get();

            if ($title) {
                return ResponseFormatter::success($data, 'Berhasil');
            } else {
                return ResponseFormatter::error(null, 'Gagal', 404);
            }
        }
    }
}
