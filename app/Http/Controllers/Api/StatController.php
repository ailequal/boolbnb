<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Flat;

class StatController extends Controller
{
    public function index(Request $request){
        $data = $request->all();
        $id = $data['id'];
        $flat = Flat::where('id', $id)->first();
        $day = $flat->vzt()->period('day')->count();
        $week = $flat->vzt()->period('week')->count();
        $month = $flat->vzt()->period('month')->count();

        $result = [
            'day'=> $day, 
            'week'=> $week, 
            'month'=> $month 
        ];
        return response()->json($result, 200);
    }
}
