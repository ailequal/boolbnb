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
        $fullAddress = $flat->street + $flat->street_number + $flat->city + $flat->cap;
        $result = [
            'lat' => $lat,
            'long' => $long
        ];
        return response()->json($result, 200);
      }

    public function create(Request $request) {
        
    }
}
