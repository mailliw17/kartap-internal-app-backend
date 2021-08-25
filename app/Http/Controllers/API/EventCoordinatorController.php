<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventCoordinatorRequest;
use App\Model\EventCoordinator;
use Illuminate\Http\Request;

class EventCoordinatorController extends Controller
{
    public function index(Request $request)
    {
        // ambil berdasarkan parameter
        $event_id  = $request->input('event_id');
        $user_id  = $request->input('user_id');

        if ($event_id) {
            $data = EventCoordinator::where('event_id', $event_id)->get();
            if ($data) {
                return ResponseFormatter::success($data, 'Berhasil');
            } else {
                return ResponseFormatter::error(null, 'Gagal', 404);
            }
        } else if ($user_id) {
            $data = EventCoordinator::where('user_id', $user_id)->get();
            if ($data) {
                return ResponseFormatter::success($data, 'Berhasil');
            } else {
                return ResponseFormatter::error(null, 'Gagal', 404);
            }
        } else {
            $data = EventCoordinator::all();

            if ($data) {
                return ResponseFormatter::success($data, 'Berhasil');
            } else {
                return ResponseFormatter::error(null, 'Gagal', 404);
            }
        }
    }

    public function create(EventCoordinatorRequest $request)
    {
        $data = new EventCoordinator();
        $data->event_id = $request->event_id;
        $data->user_id = $request->user_id;
        $data->save();

        if ($data) {
            // data sengaja dikasih null karena sesudah POST langsung msk DB
            return ResponseFormatter::success($data = null, 'Berhasil masukan data');
        } else {
            return ResponseFormatter::error(null, 'Gagal', 404);
        }
    }
}
