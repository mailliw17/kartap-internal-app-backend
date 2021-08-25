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
        $event_id  = $request->input('event_id');
        $partner_id  = $request->input('partner_id');

        if ($event_id) {
            $data = EventPartner::where('event_id', $event_id)->get();
            if ($data) {
                return ResponseFormatter::success($data, 'Berhasil');
            } else {
                return ResponseFormatter::error(null, 'Gagal', 404);
            }
        } else if ($partner_id) {
            $data = EventPartner::where('partner_id', $partner_id)->get();
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
        $data->event_id = $request->event_id;
        $data->partner_id = $request->partner_id;
        $data->save();

        if ($data) {
            // data sengaja dikasih null karena sesudah POST langsung msk DB
            return ResponseFormatter::success($data = null, 'Berhasil masukan data');
        } else {
            return ResponseFormatter::error(null, 'Gagal', 404);
        }
    }
}
