<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promo_service;

class BrainController extends Controller
{
    public function data(Request $request){
        $data = $request->all();
        $promo = Promo_service::all()->where('id', $data['id'])->first();
        $flat_id = $data['flat_id'];
        return view('braintree', compact('flat_id'), ['promo'=>$promo]);
    }
    public function store(Request $request){
        $data = $request->all();
        dd($data);
    }
}
