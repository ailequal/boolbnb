<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Flat;

class MapController extends Controller
{
    public function index(Request $request) {
        $data = $request->all();
        $flat = Flat::where('id', $data['id'])->first();

        $lat = $flat->lat;
        $long = $flat->long;
        $result = [
            'lat' => $lat,
            'long' => $long
        ];
        return response()->json($result, 200);
      }
}
