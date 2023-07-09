<?php

namespace App\Http\Controllers;

use App\Models\Yolov2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Yolov2Controller extends Controller
{
    public function index()
    {
        $yolov2 = Yolov2::all();

        return response()->json($yolov2);
    }

    public function store(Request $request)
    {
        date_default_timezone_set("Asia/Jakarta");

        Validator::make($request->all(), [
            "tinggi" => "required",
            "tinggi_2" => "required",
        ]);

        $yolov2 = Yolov2::create([
            "tinggi" => $request->input("tinggi"),
            "tinggi_2" => $request->input("tinggi_2"),
            "waktu" => date('d-m-Y H:i:s')
        ]);

        return response()->json($yolov2);
    }

    public function show($id)
    {
        $yolov2 = Yolov2::find($id);

        if ($yolov2) {
            return response()->json($yolov2, 200);
        } else {
            return response()->json([], 404);
        }
    }

    public function update(Request $request, $id)
    {
        date_default_timezone_set("Asia/Jakarta");

        Validator::make($request->all(), [
            "tinggi" => "required",
            "tinggi_2" => "required",
        ]);

        $yolov2 = Yolov2::whereId($id)->update([
            "tinggi" => $request->input("tinggi"),
            "tinggi_2" => $request->input("tinggi_2"),
            "waktu" => date('d-m-Y H:i:s')
        ]);

        return response()->json($yolov2);
    }

    public function destroy($id)
    {
        $yolov2 = Yolov2::whereId($id)->first();
        $yolov2->delete();

        if ($yolov2) {
            return response()->json([
                'success' => true,
                'message' => 'Post Berhasil Dihapus!',
            ], 200);
        }

    }
}
