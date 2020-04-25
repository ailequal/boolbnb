<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Flat;
use Illuminate\Support\Facades\Auth;

class FlatController extends Controller
{
    public function index()
    {
      $flats = Flat::all();

      return view ('flat', compact('flats'));
    }

    public function show($slug)
    {

      $flats = Flat::where('slug', $slug)->first();
      $flats->vzt()->increment();

      if(empty($flats)){
        abort(404);
      }

      return view('show', compact('flats'));
    }
}

