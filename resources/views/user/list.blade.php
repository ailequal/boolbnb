@extends('layouts.boolbnb')
 @section('main')
   <div class="welcome">
     <h1>Benvenuto {{Auth::User()->name}}</h1>
     <a href="{{route('account.flats.create')}}">
       <button class="btn btn-primary mb-3" type="button" name="button">
         Crea un nuovo appartamento
      </button>
     </a>
   </div>
   <div class="list-flat container">
     <ul>
       {{-- Primo appartamento --}}
       @foreach ($flats as $flat)
          <li>
          <div class="flat-box mb-3">
            <div class="box-image">
              <img src="{{asset('storage/' . $flat->cover)}}" alt="">
            </div>
            <div class="box-info">
              <h3>{{$flat->title}}</h3>
              <p>{{$flat->description}}</p>
            </div>
            <div class="box-button">
              <button class="btn btn-warning mb-2" type="button" name="button">Modifica</button>
              <button class="btn btn-danger mb-2" type="button" name="button">Cancella</button>
              <button class="btn btn-secondary mb-2" type="button" name="button">Statistiche</button>
            </div>
          </div>
        </li> 
       @endforeach
     </ul>

   </div>
 @endsection
