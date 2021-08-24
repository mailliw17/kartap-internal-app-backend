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
        $idEvent  = $request->input('idEvent');
        $idUser  = $request->input('idUser');

        if ($idEvent) {
            $data = EventCoordinator::where('idEvent', $idEvent)->get();
            if ($data) {
                return ResponseFormatter::success($data, 'Berhasil');
            } else {
                return ResponseFormatter::error(null, 'Gagal', 404);
            }
        } else if ($idUser) {
            $data = EventCoordinator::where('idUser', $idUser)->get();
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
        $data->idEvent = $request->idEvent;
        $data->idUser = $request->idUser;
        $data->save();

        if ($data) {
            // data sengaja dikasih null karena sesudah POST langsung msk DB
            return ResponseFormatter::success($data = null, 'Berhasil masukan data');
        } else {
            return ResponseFormatter::error(null, 'Gagal', 404);
        }
    }
}
