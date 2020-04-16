@extends('layouts.boolbnb')
 @section('main')
   <form action="" method="POST" enctype='multipart/form-data'>
     {{-- token generator --}}
     @csrf
     @method('PATCH')

     <div class="form-group">
       <label for="title">Titolo</label>
       <input type="text" name="title" placeholder="Titolo">
     </div>

     <div class="form-group">
       <label for="address">Indirizzo</label>
       <input type="text" name="address" placeholder="Indirizzo">
     </div>

     <div class="form-group">
       <label for="rooms">Numero stanza</label>
       <input type="number" name="rooms" placeholder="Numero stanza">
     </div>

     <div class="form-group">
       <label for="mq">Metri quadri</label>
       <input type="text" name="mq" placeholder="Metri quadri">
     </div>

     <div class="form-group">
       <label for="cover">Immagine copertina</label>
       <input type="file" name='cover' accept='image/*'>
     </div>

     <div class="form-group">
       <label for="guest">Numero ospiti</label>
       <input type="number" name="guest" placeholder="Numero ospiti">
     </div>

     <div class="form-group">
       <label for="description">Descrizione</label>
       <input type="text" name="description" placeholder="Descrizione">
     </div>

     <div class="form-group">
       <label for="price_day">Prezzo giornaliero</label>
       <input type="number" name="price_day" placeholder="Prezzo giornaliero">
     </div>

     <div class="form-group">
       <label for="bathrooms">Numero bagni</label>
       <input type="number" name="bathrooms" placeholder="Numero bagni">
     </div>

     {{-- Lat e Long mancano --}}

     <div class="form-group">
       <label for="hidden">Mostra appartamento</label>
       <input type="checkbox" name="hidden">
     </div>

     <div class="form-group">
       <label for="beds">Numero letti</label>
       <input type="number" name="beds" placeholder="Numero letti">
     </div>

     <input type="submit" value="Submit">
   </form>
  @endsection
