<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Promo_service;
use App\Flat;

class PaymentController extends Controller
{
    public function store(Request $request){
        $data = $request->all();
        $flat = Flat::where('id', $data['flat'])->first();
        $result = $flat->promo_service()->attach($data['promo']);
        return response()->json($result);
    }
}
