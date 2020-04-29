<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Flat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Promo_service;
use Carbon\Carbon;

class FlatController extends Controller
{
    public function index()
    {
      // chiamamo tutti i flat dal db
      // prendi solo quelli con la promo e end maggiore di now
      $now = Carbon::now();

      $flatsPromo = DB::table("flats")
      ->select("*")
      ->join('flat_promo_service', 'flats.id', '=', 'flat_promo_service.flat_id')
      ->join('promo_services', 'flat_promo_service.promo_service_id', '=', 'promo_services.id')
      ->where('end', '>', $now)
      ->where('hidden', '=', 0)
      ->get();
      $flats = DB::table("flats")
      ->select("*")
      ->leftJoin('flat_promo_service', 'flats.id', '=', 'flat_promo_service.flat_id')
      ->leftJoin('promo_services', 'flat_promo_service.promo_service_id', '=', 'promo_services.id')
      ->where('promo_service_id', '=', null)
      ->where('hidden', '=', 0)
      ->get();
      return view ('my-home', compact('flats','flatsPromo'));
    }

    public function show($slug)
    {
      $promos = Promo_service::all();
      $flats = Flat::where('slug', $slug)->first();
      $flats->vzt()->increment();

      if(empty($flats)){
        abort(404);
      }

      return view('show', compact('flats', 'promos'));
    }
}

