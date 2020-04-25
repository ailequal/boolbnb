@extends('layouts.boolbnb')
 @section('main')

    <div style="width:500px; height:500px;">
            <canvas id="myChart" width="400" height="400"></canvas>
    </div>
    <div style="width:500px; height:500px;">
            <canvas id="myMessage" width="400" height="400"></canvas>
    </div>


    <input type="hidden" id="id" value="{{$flat->id}}">

    <script src="{{asset('js/stat.js')}}"></script>

 @endsection
