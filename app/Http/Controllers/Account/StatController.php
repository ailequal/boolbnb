<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Flat;

class StatController extends Controller
{
    public function show($slug){
        $flat = Flat::where('slug', $slug)->first();

        if(empty($flat)){
          abort(404);
        }

        return view('user.stats', compact('flat'));
    }
}
