<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisteredEventRequest;
use App\Model\RegisteredEvent;
use Illuminate\Http\Request;

class RegisteredEventController extends Controller
{
    public function index(Request $request)
    {
        // ambil berdasarkan parameter
        $event_id  = $request->input('event_id');
        $event_member_id  = $request->input('event_member_id');

        if ($event_id) {
            $data = RegisteredEvent::where('event_id', $event_id)->get();
            if ($data) {
                return ResponseFormatter::success($data, 'Berhasil');
            } else {
                return ResponseFormatter::error(null, 'Gagal', 404);
            }
        } else if ($event_member_id) {
            $data = RegisteredEvent::where('event_member_id', $event_member_id)->get();
            if ($data) {
                return ResponseFormatter::success($data, 'Berhasil');
            } else {
                return ResponseFormatter::error(null, 'Gagal', 404);
            }
        } else {
            $data = RegisteredEvent::all();

            if ($data) {
                return ResponseFormatter::success($data, 'Berhasil');
            } else {
                return ResponseFormatter::error(null, 'Gagal', 404);
            }
        }
    }

    public function create(RegisteredEventRequest $request)
    {
        $data = new RegisteredEvent();
        $data->event_id = $request->event_id;
        $data->event_member_id = $request->event_member_id;
        $data->dateRegistered = $request->dateRegistered;
        $data->save();

        if ($data) {
            // data sengaja dikasih null karena sesudah POST langsung msk DB
            return ResponseFormatter::success($data = null, 'Berhasil masukan data');
        } else {
            return ResponseFormatter::error(null, 'Gagal', 404);
        }
    }
}
