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
        $flat = Flat::where('id', $id)->first();
        $visits = DB::table('visits')
        ->select('*')
        ->where('flat_id', $flat->id)
        ->orderby('visits.id', 'desc')
        ->get();
        $timestamps = [];
        foreach ($visits as $visit) {
            $day = new Carbon($visit->created_at);
            if ($day->isSameMonth(Carbon::now())) {
                $timestamps[] = $visit->created_at;
            }
        }
        dd($timestamps);

        $result = [
            'day'=> $day, 
            'week'=> $week, 
            'month'=> $month 
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
