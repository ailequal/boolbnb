@extends('layouts.boolbnb')
@section('main')
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
<form action="{{route('account.flats.store')}}" method="POST" enctype='multipart/form-data'>
    {{-- token generator --}}
    @csrf
    @method('POST')

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
        <input type="text" name="price_day" placeholder="Prezzo giornaliero">
    </div>

    <div class="form-group">
        <label for="bathrooms">Numero bagni</label>
        <input type="number" name="bathrooms" placeholder="Numero bagni">
    </div>

    <div class="form-group">
        <label for="beds">Numero di Letti</label>
        <input type="number" name="beds" placeholder="Numero letti">
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
    {{-- <span>{{$tag->name}}</span>
    <input type="checkbox" name="tags[]" value="{{$tag->id}}" @if(is_array(old('tags')) && in_array($tag->id,
    old('tags'))) checked @endif> --}}

    {{-- 'wifi',
     'smoking',
     'parking',
     'swimming pool',
     'breakfast',
     'view' --}}

    <input type="submit" value="Submit">
</form>
@endsection