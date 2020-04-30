@extends('layouts.boolbnb')
 @section('main')

    <div style="width:800px; height:500px;">
            <canvas id="myChart"></canvas>
    </div>
    <div style="width:500px; height:500px;">
            <canvas id="myMessage"></canvas>
    </div>

    <input type="hidden" id="id" value="{{$flat->id}}">

    <script src="{{asset('js/stat.js')}}"></script>

 @endsection
