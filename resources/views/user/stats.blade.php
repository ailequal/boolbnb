@extends('layouts.boolbnb')
@section('main')

<label for="month">Visualizza le statistiche per il mese: </label>

<select id="month">
    <option class="default" value="" disabled selected="">--</option>
    <option value="1">Gennaio</option>
    <option value="2">Febbraio</option>
    <option value="3">Marzo</option>
    <option value="4">Aprile</option>
    <option value="5">Maggio</option>
    <option value="6">Giugno</option>
    <option value="7">Luglio</option>
    <option value="8">Agosto</option>
    <option value="9">Settembre</option>
    <option value="10">Ottobre</option>
    <option value="11">Novembre</option>
    <option value="12">Dicembre</option>
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