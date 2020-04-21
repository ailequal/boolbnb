@extends('layouts.boolbnb')
@section('main')

<form action="{{route('account.flats.store')}}" method="POST" enctype='multipart/form-data'>
    {{-- token generator --}}
    @csrf
    @method('POST')

   <div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>

    <div class="form-group">
        <label for="title">Titolo</label>
    <input type="text" name="title" placeholder="Titolo" value="{{old('title')}}">
    </div>

    <div class="form-group">
        <label for="street">Via</label>
         <input class="street_control" type="text" name="street" placeholder="Via" value="{{old('street')}}">
         <span class="error"></span>
    </div>
    <div class="form-group">
        <label for="street_number">Civico</label>
        <input class="number_control" type="text" name="street_number" placeholder="Civico" value="{{old('street_number')}}">
        <span class="error"></span>
    </div>
    <div class="form-group">
        <label for="city">Città</label>
        <input class="city_control" type="text" name="city" placeholder="Città" value="{{old('city')}}">
        <span class="error"></span>
    </div>
    <div class="form-group">
        <label for="zip_code">Cap</label>
        <input class="zip_control" type="text" name="zip_code" placeholder="Cap" value="{{old('zip_code')}}">
        <span class="error"></span>
    </div>

    <div class="form-group">
        <label for="rooms">Numero stanza</label>
        <input type="number" name="rooms" placeholder="Numero stanza" value="{{old('rooms')}}">
    </div>

    <div class="form-group">
        <label for="mq">Metri quadri</label>
        <input type="text" name="mq" placeholder="Metri quadri" value="{{old('mq')}}">
    </div>

    <div class="form-group">
        <label for="cover">Immagine copertina</label>
        <input type="file" name='cover' accept='image/*'>
    </div>

    <div class="form-group">
        <label for="guest">Numero ospiti</label>
        <input type="number" name="guest" placeholder="Numero ospiti" value="{{old('guest')}}">
    </div>

    <div class="form-group">
        <label for="description">Descrizione</label>
        <input type="text" name="description" placeholder="Descrizione" value="{{old('description')}}">
    </div>

    <div class="form-group">
        <label for="price_day">Prezzo giornaliero</label>
        <input type="text" name="price_day" placeholder="Prezzo giornaliero" value="{{old('price_day')}}">
    </div>

    <div class="form-group">
        <label for="bathrooms">Numero bagni</label>
        <input type="number" name="bathrooms" placeholder="Numero bagni" value="{{old('bathrooms')}}">
    </div>

    <div class="form-group">
        <label for="beds">Numero di Letti</label>
        <input type="number" name="beds" placeholder="Numero letti" value="{{old('beds')}}">
    </div>

    

    {{-- Lat e Long mancano --}}

    <div class="form-group">
        <label for="hidden">Nascosto</label>
        
          <div>
            <span>Yes</span>
            <input type="radio" name="hidden"value="1">
          </div>
          <div>
            <span>No</span>
            <input type="radio" name="hidden"value="0" >
          </div>
      </div>

    <h3>Servizi extra</h3>

    <div class="form-group">
        <label for="extra_service">Servizi Aggiuntivi</label>
        @foreach ($extra_services as $extra_service)
          <div>
            <span>{{$extra_service->name}}</span>
            <input type="checkbox" name="extra_service[]"value="{{$extra_service->id}}">
          </div>
        @endforeach

      </div>

      <h3>Promo attivabili</h3>

      <div class="form-group">
        <label for="promo_service">Promozioni Aggiuntivi</label>
        @foreach ($promo_services as $promo_service)
          <div>
            <span>{{$promo_service->description}}</span>
            <input type="radio" name="promo_service[]"value="{{$promo_service->id}}">
          </div>
        @endforeach

      </div>
    <input id="submit" type="submit" value="Submit">
</form>
@endsection

@section('script')
<script src="{{asset('js/create.js')}}"></script>
@endsection