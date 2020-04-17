@extends('layouts.boolbnb')
 @section('main')

   <div class="box-cover container"></div>
   <div class="box-desc container">
     <div class="box-info">
       <h1>{{$flats->title}}</h1>
       <p>{{$flats->description}}</p>
     </div>
    
     <div class="box-services">
       <ul>
         <li>
           {{$flats->address}}
         </li>
         <li>
           {{$flats->rooms}}
         </li>
         <li>
           {{$flats->mq}}
         </li>
         <li>
           {{$flats->beds}}
         </li>
         <li>
           {{$flats->price_day}}
         </li>
         <li>
           {{$flats->bathrooms}}
         </li>
       </ul>
     </div>
   </div>

   <div class="box-images container">
     <div class="image">
       <img src="{{asset('storage/' . $flats->cover)}}" alt="">
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
