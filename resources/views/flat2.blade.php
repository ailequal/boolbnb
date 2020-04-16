@extends('layouts.boolbnb')
 @section('main')

   <div class="box-cover container"></div>
   <div class="box-desc container">
     <div class="box-info">
       <h1>Bedrooms Sun Rise @ Three Sisters</h1>
       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
     </div>
     <div class="box-services">
       <ul>
         <li>
           Indirizzo
         </li>
         <li>
           Numero stanze
         </li>
         <li>
           Metri quadri
         </li>
         <li>
           Numero letti
         </li>
         <li>
           Prezzo giornaliero
         </li>
         <li>
           Numero bagni
         </li>
       </ul>
     </div>
   </div>

   <div class="box-images container">
     <div class="image">
       <img src="{{asset('images/4bb984fa_original.jpg')}}" alt="">
     </div>
     <div class="image">
       <img src="{{asset('images/39f74208_original.jpg')}}" alt="">
     </div>
     <div class="image">
       <img src="{{asset('images/51073698-857a-4b5d-b3c6-a618d02ae82d.jpg')}}" alt="">
     </div>
   </div>
   <div class="box-bottom container">
     <div class="box-map">
       <h3>Mappa</h3>
     </div>
     <div class="box-message">
       <form action="" method="POST">
         @csrf
         @method('POST')
         <h3>Scrivi al proprietario</h3>
         <div class="form-group">
           <label for="title">Titolo</label>
           <input type="text" name='title' placeholder="Titolo">
         </div>
         <div class="form-group">
           <label for="email">Email</label>
           <input type="text" name='email' placeholder="Email">
         </div>
         <div class="form-group">
           <label for="message">Messaggio</label>
           <input type="text" name='message' placeholder="Messaggio">
         </div>
         <input type="submit" value="Submit">
       </form>
     </div>
   </div>
 @endsection
