@extends('layouts.boolbnb')
@section('main')

@php
    use Carbon\Carbon;
    $now = Carbon::now()->month;
    $months = [
        1 => 'Gennaio',
        2 => 'Febbraio',
        3 => 'Marzo',
        4 => 'Aprile',
        5 => 'Maggio',
        6 => 'Giugno',
        7 => 'Luglio',
        8 => 'Agosto',
        9 => 'Settembre',
        10 => 'Ottobre',
        11 => 'Novembre',
        12 => 'Dicembre'
    ];
@endphp

<label for="month">Visualizza le statistiche per il mese: </label>

<select id="month">
    <option class="default" value="" disabled selected="">--</option>
    @for ($i = 1; $i <= $now; $i++)
    @foreach ($months as $key => $month)
        @if ($key == $i)
        <option value="{{$key}}">{{$month}}</option>
        @endif
    @endforeach
    @endfor
</select>

<div style="width:800px; height:500px;">
    <canvas id="myChart"></canvas>
</div>
<div style="width:500px; height:500px;">
    <canvas id="myMessage"></canvas>
</div>

<input type="hidden" id="id" value="{{$flat->id}}">

<script src="{{asset('js/stat.js')}}"></script>

@endsection