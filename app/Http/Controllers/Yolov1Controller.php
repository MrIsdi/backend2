<?php

namespace App\Http\Controllers;

use App\Models\Yolov1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Yolov1Controller extends Controller
{
    public function index()
    {
        $yolov1 = Yolov1::all();

        return response()->json($yolov1);
    }

    public function store(Request $request)
    {
        date_default_timezone_set("Asia/Jakarta");

        Validator::make($request->all(), [
            "tumbuh" => "required",
            "belumTumbuh" => "required",
        ]);

        $yolov1 = Yolov1::create([
            "tumbuh" => $request->input("tumbuh"),
            "belumTumbuh" => $request->input("belumTumbuh"),
            "waktu" => date('d-m-Y H:i:s')
        ]);

        return response()->json($yolov1);
    }

    public function show($id)
    {
        $yolov1 = Yolov1::find($id);

        if ($yolov1) {
            return response()->json($yolov1, 200);
        } else {
            return response()->json([], 404);
        }
    }

    public function update(Request $request, $id)
    {
        date_default_timezone_set("Asia/Jakarta");

        Validator::make($request->all(), [
            "tumbuh" => "required",
            "belumTumbuh" => "required",
        ]);

        $yolov1 = Yolov1::whereId($id)->update([
            "tumbuh" => $request->input("tumbuh"),
            "belumTumbuh" => $request->input("belumTumbuh")
        ]);

        return response()->json($yolov1);
    }

    public function destroy($id)
    {
        $yolov1 = Yolov1::whereId($id)->first();
        $yolov1->delete();

        if ($yolov1) {
            return response()->json([
                'success' => true,
                'message' => 'Post Berhasil Dihapus!',
            ], 200);
        }

    }
}
