<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Flat;
use App\Message;
use Carbon\Carbon;
use App\Visit;

class StatController extends Controller
{
    public function index(Request $request){
        $data = $request->all();
        $id = $data['id'];
        $month = $data['month'];
        $flat = Flat::where('id', $id)->first();
        $visits = DB::table('visits')
        ->select('*')
        ->where('flat_id', $flat->id)
        ->orderby('visits.created_at', 'asc')
        ->get();

        
        $timestamps = [];
        foreach ($visits as $visit) {
            $day = new Carbon($visit->created_at);
            if ($month == null) {
                if ($day->isSameMonth(Carbon::now())) {
                    $timestamps[] = new Carbon($visit->created_at);
                }
            } else {
                $monthCarbon = new Carbon('2020-' . $month . '-1 12:00:00');
                if ($day->isSameMonth($monthCarbon)) {
                    $timestamps[] = new Carbon($visit->created_at);
                }
            }
        }

        // numero di girni totali del mese attuale
        if ($month == null) {
            $days = Carbon::now()->daysInMonth;
        } else {
            $days = $monthCarbon->daysInMonth;
        }

        // array con dati finali
        $stats = [];
        // cicliamo ogni singolo giorno del mese
        for ($i=1; $i <= $days; $i++) {
            $j = 0;
            // cicliamo le date nella tabella visits del db
            foreach ($timestamps as $key => $timestamp) {
                // controlliamo che il giorno attuale $i e' uguale al giorno del timestamp
                if ($timestamp->day == $i) {
                    $j =  $j + 1;
                    $stats[$i] = $j;
                } else {
                    $stats[$i] = $j;
                }
            }
        }

        $statsNew = array_values($stats);

        $daysArray = [];
        for ($i=1; $i <= $days ; $i++) { 
            $daysArray[] = $i;
        }

        $result = [
            'stats'=> $statsNew,
            'days' => $daysArray
        ];
        return response()->json($result, 200);
    }

    public function message(Request $request){
        $data = $request->all();
        $id = $data['id'];
        $flat = Flat::where('id', $id)->first();
        
        $messagesMonth= count(Message::where('created_at', ">", DB::raw('NOW() - INTERVAL 1 MONTH'))
        ->where('flat_id', '=', $id)
        ->get());
        $messagesWeek= count(Message::where('created_at', ">", DB::raw('NOW() - INTERVAL 1 WEEK'))
        ->where('flat_id', '=', $id)
        ->get());
        $messagesDay= count(Message::where('created_at', ">", DB::raw('NOW() - INTERVAL 1 DAY'))
        ->where('flat_id', '=', $id)
        ->get());
        
        $result = [
            'day'=> $messagesDay, 
            'week'=> $messagesWeek, 
            'month'=> $messagesMonth 
        ];
        return response()->json($result, 200);
    }
}
