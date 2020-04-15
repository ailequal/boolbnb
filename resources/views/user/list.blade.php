@extends('layouts.boolbnb')
 @section('main')
   <div class="welcome">
     <h1>Benvenuto utente</h1>
     <button class="btn btn-primary" type="button" name="button">
       Crea un nuovo appartamento
     </button>
   </div>
   <div class="list-flat container">
     <ul>
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
             <button class="btn btn-warning" type="button" name="button">Modifica</button>
             <button class="btn btn-danger" type="button" name="button">Cancella</button>
             <button class="btn btn-secondary" type="button" name="button">Promozioni</button>
             <button class="btn btn-secondary" type="button" name="button">Statistiche</button>
           </div>
         </div>
       </li>
     </ul>

   </div>
 @endsection
