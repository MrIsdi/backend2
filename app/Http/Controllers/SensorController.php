<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SensorController extends Controller
{
    public function index(Request $request)
    {
        // $end = $request->get("_end");
        // $order = $request->get("_order");
        // $sort = $request->get("_sort");
        // $start = $request->get("_start");
        // $sensor = DB::table("sensors")
        //     ->take($end)
        //     ->orderBy($sort, $order)
        //     ->skip($start)
        //     ->get();
        // return response()
        //     ->json($sensor)
        //     ->withHeaders([
        //         "X-Total-Count" => count($sensor)
        //     ]);
        $sensor = Sensor::all();
        return response()->json($sensor);
    }

    public function store(Request $request)
    {
        date_default_timezone_set("Asia/Jakarta");

        Validator::make($request->all(), [
            "suhu" => "required",
            "lembap" => "required",
            "cahaya" => "required"
        ]);

        $sensor = Sensor::create([
            "suhu" => $request->input("suhu"),
            "lembap" => $request->input("lembap"),
            "cahaya" => $request->input("cahaya"),
            "waktu" => date('d-m-Y H:i:s')
        ]);

        return response()->json($sensor);
    }

    public function show($id)
    {
        $sensor = Sensor::find($id);

        if ($sensor) {
            return response()->json($sensor, 200);
        } else {
            return response()->json([], 404);
        }
    }

    public function update(Request $request, $id)
    {
        date_default_timezone_set("Asia/Jakarta");

        Validator::make($request->all(), [
            "suhu" => "required",
            "lembap" => "required",
            "cahaya" => "required"
        ]);

        $sensor = Sensor::whereId($id)->update([
            "suhu" => $request->input("suhu"),
            "lembap" => $request->input("lembap"),
            "cahaya" => $request->input("cahaya")
        ]);

        return response()->json($sensor);
    }

    public function destroy($id)
    {
        $sensor = Sensor::whereId($id)->first();
        $sensor->delete();

        if ($sensor) {
            return response()->json([
                'success' => true,
                'message' => 'Post Berhasil Dihapus!',
            ], 200);
        }
    }
}
