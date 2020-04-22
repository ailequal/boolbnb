<?php

namespace App\Http\Controllers\Api;

use App\Flat;
use App\Flat_address;
use App\Extra_service;
use App\Promo_service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dati inseriti nella ricerca
        $data = $request->all();
        $city = $data['city'];
        $beds = $data['beds'];
        $rooms = $data['rooms'];
        
        // $services = DB::table('flats')
        // ->join('extra_services', 'flats.id', '=', 'extra_services.flat_id')
        // ->get();
        
        // dd($services);
        $db = DB::table('flats')->get();
        $flats = DB::table('flats')
        ->join('flat_addresses', 'flats.id', '=', 'flat_addresses.flat_id')
        ->where('flat_addresses.city', '=', $city)
        ->where(function ($db) use($beds){
            if($beds != null){
                $db->where('flats.beds', '=', $beds);
            }
        })
        ->where(function ($db) use($rooms){
            if($rooms != null){
                $db->where('flats.beds', '=', $rooms);
            }
        })
        ->get();

        
        
        $result = [
            'flats' => $flats
        ];
        return response()->json($result, 200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
