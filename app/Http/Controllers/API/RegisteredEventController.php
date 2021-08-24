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
        $idEvent  = $request->input('idEvent');
        $idEventMember  = $request->input('idEventMember');

        if ($idEvent) {
            $data = RegisteredEvent::where('idEvent', $idEvent)->get();
            if ($data) {
                return ResponseFormatter::success($data, 'Berhasil');
            } else {
                return ResponseFormatter::error(null, 'Gagal', 404);
            }
        } else if ($idEventMember) {
            $data = RegisteredEvent::where('idEventMember', $idEventMember)->get();
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
        $data->idEvent = $request->idEvent;
        $data->idEventMember = $request->idEventMember;
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
