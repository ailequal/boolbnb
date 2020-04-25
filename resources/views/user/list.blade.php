@extends('layouts.boolbnb')
 @section('main')
   <div class="welcome">
     <h1>Benvenuto {{Auth::User()->name}}</h1>
     <a href="{{route('account.flats.create')}}">
       <button class="btn btn-primary mb-3" type="button" name="button">
         Crea un nuovo appartamento
      </button>
      <button class="btn btn-primary mb-3" type="button" name="button">
        <a href="{{route('account.message.index')}}">Messaggi Ricevuti</a>
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
              <a href="{{route('show.flat', $flat->slug)}}">
                <p>{{$flat->title}}</p>
              </a>
              <p>{{$flat->description}}</p>
            </div>
            <div class="box-button">
              <a href="{{route('account.flats.edit', $flat->slug)}}"><button class="btn btn-warning mb-2" type="button" name="button">Modifica</button></a>
              <form action="{{route('account.flats.destroy', $flat->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger mb-2" name="button">DELETE</button>
              </form>
              <button class="btn btn-secondary mb-2" type="button" name="button">
                <a href="{{route('account.stat.show', $flat->slug)}}">Statistiche</a>
              </button>
            </div>
          </div>
        </li> 
       @endforeach
     </ul>

   </div>
 @endsection
