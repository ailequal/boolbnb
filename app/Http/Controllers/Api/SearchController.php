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
        $lat = $data['lat'];
        $lng = $data['long'];
        
        $db = DB::table('flats')->get();
    
        $flats = DB::table("flats")
        ->select("*"
        ,DB::raw("6371 * acos(cos(radians(" . $lat . ")) 
        * cos(radians(flats.lat)) 
        * cos(radians(flats.long) - radians(" . $lng . ")) 
        + sin(radians(" .$lat. ")) 
        * sin(radians(flats.lat))) AS distance"))
        ->having("distance", "<=", 20)
        ->join('flat_addresses', 'flats.id', '=', 'flat_addresses.flat_id')
        ->where('flat_addresses.city', '=', $city)
        ->get();

        $result = [
            'flats' => $flats
        ];
        return response()->json($result, 200);
    }


    public function advanced(Request $request) {
        // dati inseriti nella ricerca
        $data = $request->all();
        $city = $data['city'];
        $lat = $data['lat'];
        $lng = $data['long'];
        $beds = $data['beds'];
        $rooms = $data['rooms'];
        $radius = $data['radius'];
        $wifi = $data['wifi'];
        $smoking = $data['smoking'];
        $parking = $data['parking'];
        $swimmingPool = $data['swimmingPool'];
        $breakfast = $data['breakfast'];
        $view = $data['view'];

        $db = DB::table('flats')->get();
    
        $flats = DB::table("flats")
        ->select("*"
        ,DB::raw("6371 * acos(cos(radians(" . $lat . ")) 
        * cos(radians(flats.lat)) 
        * cos(radians(flats.long) - radians(" . $lng . ")) 
        + sin(radians(" .$lat. ")) 
        * sin(radians(flats.lat))) AS distance"))
        ->join('extra_service_flat', 'flats.id', '=', 'extra_service_flat.flat_id')
        ->join('extra_services', 'extra_service_flat.extra_service_id', '=', 'extra_services.id')
        ->join('flat_addresses', 'flats.id', '=', 'flat_addresses.flat_id')
        ->having("distance", "<=", $radius)
        ->where('flat_addresses.city', '=', $city)
        ->where(function ($db) use($beds){
            if($beds != null){
                $db->where('flats.beds', '=', $beds);
            }
        })
        ->where(function ($db) use($rooms){
            if($rooms != null){
                $db->where('flats.rooms', '=', $rooms);
            }
        })
        ->where(function ($db) use($wifi){
            if($wifi == 'true'){
                $db->where('extra_service_flat.extra_service_id', '=', '1');
            }
        })
        ->where(function ($db) use($smoking){
            if($smoking == 'true'){
                $db->where('extra_service_flat.extra_service_id', '=', '2');
            }
        })
        ->get();

        // dd($flats);
        

        $newFlats = [];
        // ciclare tutti i flats
        for ($i=0; $i < count($flats); $i++) { 
            // controllare i flat che hanno lo stesso id
            if (isset($flats[$i + 1])) {
                if ($flats[$i]->id == $flats[$i+1]->id) {
                    var_dump($i);
                    // var_dump('sono uguali');
                    // salviamo nel primo dei due array il nuovo servizio
                    //$servizi = $flats[$i + 1]->name . ' ' . $flats[$i]->name;


                    $servizi = $flats[$i]->name . ' ' . $flats[$i + 1]->name;

                    $flats[$i + 1]->name = $servizi;
                    // cancella array usato ormai inutile
                    // unset($flats[$i]);
                    // $flats[$i]->delete();
                    // $pippo . $flats[$i + 1]->name;
                    // var_dump($servizi);
                } else{
                    $newFlats[] = $flats[$i];
                    // dd($flats[$i]);
                }
            }
        }

        dd($newFlats);
        die();

        // lista cognomi:

        // var listaCognomi = ['Pippo', 'Pluto', 'Paperino', 'Topolino'];

        //         var invitato = false;

        //     for (var i = 0; i < listaCognomi.length; i++){
        //     if (cognomeUtente == listaCognomi [i]){
        //         invitato = true;
        //         }
        //     }
        //     console.log(invitato);

        //     if (invitato ==true){
        //     alert ('Benvenuto');
        //     }
        //     else{
        //     alert ('mi spiace, non sei stato invitato');
        //     }


        // for ($i=0; $i < count($flats); $i++) {
            // $flatDb = Flat::where('id', $flats[1]->id)->first();
            // dd($flatDb->extra_service);
            // $flight = App\Flight::where('number', 'FR 900')->first();
            // dd($flatDb);
        // }

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
