@extends('layouts.boolbnb')
 @section('main')
    <p>{{$flats['rooms']}}</p>
    <img src="{{asset('storage/' . $flats->cover)}}" alt="">
    <a href="">modifica</a>
    <a href="{{route('flats')}}">Torna alla Home</a>
 @endsection