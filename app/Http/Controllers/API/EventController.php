<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Event;
use App\Http\Requests\EventRequest;

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

    public function create(EventRequest $request)
    {
        $data = new Event();
        $data->title = $request->title;
        $data->subTitle = $request->subTitle;
        $data->description = $request->description;
        $data->registrationUrl = $request->registrationUrl;
        $data->status = $request->status;
        $data->image = $request->image;

        $data->save();

        if ($data) {
            // data sengaja dikasih null karena sesudah POST langsung msk DB
            return ResponseFormatter::success($data = null, 'Berhasil masukan data');
        } else {
            return ResponseFormatter::error(null, 'Gagal', 404);
        }
    }

    public function update(EventRequest $request, $id)
    {
        $title = $request->title;
        $subTitle = $request->subTitle;
        $description = $request->description;
        $registrationUrl = $request->registrationUrl;
        $status = $request->status;
        $image = $request->image;

        $data = Event::findOrFail($id);

        $data->title = $title;
        $data->subTitle = $subTitle;
        $data->description = $description;
        $data->registrationUrl = $registrationUrl;
        $data->status = $status;
        $data->image = $image;

        $data->save();

        if ($data) {
            // data sengaja dikasih null karena sesudah POST langsung msk DB
            return ResponseFormatter::success($data = null, 'Berhasil update data');
        } else {
            return ResponseFormatter::error(null, 'Gagal', 404);
        }
    }

    public function delete($id)
    {
        $data = Event::findOrFail($id);
        $data->delete();

        if ($data) {
            // data sengaja dikasih null karena sesudah POST langsung msk DB
            return ResponseFormatter::success($data = null, 'Berhasil delete data');
        } else {
            return ResponseFormatter::error(null, 'Gagal', 404);
        }
    }
}
