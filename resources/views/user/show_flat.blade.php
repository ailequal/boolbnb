@extends('layouts.boolbnb')
 @section('main')
    <p>{{$flats['rooms']}}</p>
    <img src="{{asset('storage/' . $flats->cover)}}" alt="">
    <a href="">modifica</a>
 @endsection