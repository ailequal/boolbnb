@extends('layouts.boolbnb')
 @section('main')
   <div class="welcome">
     <h1>Benvenuto utente</h1>
     <button class="btn btn-primary mb-3" type="button" name="button">
       Crea un nuovo appartamento
     </button>
   </div>
   <div class="list-flat container">
     <ul>
       {{-- Primo appartamento --}}
       <li>
         <div class="flat-box mb-3">
           <div class="box-image">
            <img src="{{asset('images/world.jpg')}}" alt="">
           </div>
           <div class="box-info">
             <h3>Titolo</h3>
             <p>Lorem ipsum dolor sit amet.
             Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.</p>
           </div>
           <div class="box-button">
             <button class="btn btn-warning mb-2" type="button" name="button">Modifica</button>
             <button class="btn btn-danger mb-2" type="button" name="button">Cancella</button>
             <button class="btn btn-secondary mb-2" type="button" name="button">Statistiche</button>
           </div>
         </div>
       </li>
       {{-- Secondo appartamento --}}
       <li>
         <div class="flat-box">
           <div class="box-image">
            <img src="{{asset('images/world.jpg')}}" alt="">
           </div>
           <div class="box-info">
             <h3>Titolo</h3>
             <p>Lorem ipsum dolor sit amet.
             Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.</p>
           </div>
           <div class="box-button">
             <button class="btn btn-warning mb-2" type="button" name="button">Modifica</button>
             <button class="btn btn-danger mb-2" type="button" name="button">Cancella</button>
             <button class="btn btn-secondary mb-2" type="button" name="button">Statistiche</button>
           </div>
         </div>
       </li>
     </ul>

   </div>
 @endsection
