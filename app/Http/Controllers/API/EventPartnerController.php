<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventPartnerRequest;
use App\Model\EventPartner;
use Illuminate\Http\Request;

class EventPartnerController extends Controller
{
    public function index(Request $request)
    {
        // ambil berdasarkan parameter
        $idEvent  = $request->input('idEvent');
        $idPartner  = $request->input('idPartner');

        if ($idEvent) {
            $data = EventPartner::where('idEvent', $idEvent)->get();
            if ($data) {
                return ResponseFormatter::success($data, 'Berhasil');
            } else {
                return ResponseFormatter::error(null, 'Gagal', 404);
            }
        } else if ($idPartner) {
            $data = EventPartner::where('idPartner', $idPartner)->get();
            if ($data) {
                return ResponseFormatter::success($data, 'Berhasil');
            } else {
                return ResponseFormatter::error(null, 'Gagal', 404);
            }
        } else {
            $data = EventPartner::all();

            if ($data) {
                return ResponseFormatter::success($data, 'Berhasil');
            } else {
                return ResponseFormatter::error(null, 'Gagal', 404);
            }
        }
    }

    public function create(EventPartnerRequest $request)
    {
        $data = new EventPartner();
        $data->idEvent = $request->idEvent;
        $data->idPartner = $request->idPartner;
        $data->save();

        if ($data) {
            // data sengaja dikasih null karena sesudah POST langsung msk DB
            return ResponseFormatter::success($data = null, 'Berhasil masukan data');
        } else {
            return ResponseFormatter::error(null, 'Gagal', 404);
        }
    }
}
