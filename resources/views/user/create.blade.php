@section('head')
<link rel='stylesheet' type='text/css'
    href='https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.52.0/maps/maps.css' />
@endsection

@extends('layouts.boolbnb')
@section('main')
<div class="create-container">
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
            <span class="label"><label for="title">Titolo</label></span>
            <span><input class="box" type="text" name="title" placeholder="Titolo" value="{{old('title')}}"></span>
        </div>

        <div class="form-group">
            <span class= "label"><label for="street">Via</label></span>
            <span><input class="box" class="street" type="text" name="street" placeholder="Via" value="{{old('street')}}"></span>
        </div>
        <div class="form-group">
            <span class= "label"><label for="street_number">Civico</label></span>
            <span><input class="box" class="street-number" type="text" name="street_number" placeholder="Civico" value="{{old('street_number')}}"></span>
        </div>
        <div class="form-group">
            <span class= "label"><label for="city">Città</label></span>
            <span><input class="box" class="city" type="text" name="city" placeholder="Città" value="{{old('city')}}"></span>
        </div>
        <div class="form-group">
            <span class= "label"><label for="zip_code">Cap</label></span>
            <span><input class="box" class="cap" type="text" name="zip_code" placeholder="Cap" value="{{old('zip_code')}}"></span>
        </div>

        <div id='map' class='map' style="height: 500px; width: 500px;"></div>
        <input type="button" class="btn btn-primary map-button" value="Controlla indirizzo">

        <div class="form-group">
            <span class= "label"><label for="rooms">Numero stanza</label></span>
            <span><input class="box" type="number" name="rooms" placeholder="Numero stanza" value="{{old('rooms')}}"></span>
        </div>

        <div class="form-group">
            <span class= "label"><label for="mq">Metri quadri</label></span>
            <span><input class="box" type="text" name="mq" placeholder="Metri quadri" value="{{old('mq')}}"></span>
        </div>

        <div class="form-group">
            <span class= "label"><label for="guest">Numero ospiti</label></span>
            <span><input class="box" type="number" name="guest" placeholder="Numero ospiti" value="{{old('guest')}}"></span>
        </div>

        <div class="form-group">
            <span class= "label"><label for="description">Descrizione</label></span>
            <span><input class="box" type="text" name="description" placeholder="Descrizione" value="{{old('description')}}"></span>
        </div>

        <div class="form-group">
            <span class= "label"><label for="price_day">Prezzo giornaliero</label></span>
            <span><input class="box" type="text" name="price_day" placeholder="Prezzo giornaliero" value="{{old('price_day')}}"></span>
        </div>

        <div class="form-group">
            <span class= "label"><label for="bathrooms">Numero bagni</label></span>
            <span><input class="box" type="number" name="bathrooms" placeholder="Numero bagni" value="{{old('bathrooms')}}"></span>
        </div>

        <div class="form-group">
            <span class= "label"><label for="beds">Numero di Letti</label></span>
            <span><input class="box" type="number" name="beds" placeholder="Numero letti" value="{{old('beds')}}"></span>
        </div>

        <div class="form-group">
            <span class= "label">
                <label class= "cover-custom" for="cover">
                    <input id="cover" type="file" name='cover' accept='image/*'>
                    Scegli l'immagine di copertina
                </label>
                
            </span>
            {{-- <input class="box" type="file" name='cover' accept='image/*'> --}}
        </div>

        <div class="form-group hide">
            <label for="lat"></label>
            <input class="box" class="lat" name="lat" type="hidden" value="">
        </div>

        <div class="form-group hide">
            <label for="long"></label>
            <input class="box" class="long" name="long" type="hidden" value="">
        </div>
        

        <div class="form-group">
            <label for="hidden">Nascosto</label>
            
            <div>
                <span>Yes</span>
                <input class="box" type="radio" name="hidden"value="1">
            </div>
            <div>
                <span>No</span>
                <input class="box" type="radio" name="hidden"value="0" >
            </div>
        </div>

        <h3>Servizi extra</h3>

        <div class="form-group">
            <label for="extra_service">Servizi Aggiuntivi</label>
            @foreach ($extra_services as $extra_service)
            <div>
                <span>{{$extra_service->name}}</span>
                <input class="box" type="checkbox" name="extra_service[]"value="{{$extra_service->id}}">
            </div>
            @endforeach

        </div>

        {{-- <h3>Promo attivabili</h3>

        <div class="form-group">
            <label for="promo_service">Promozioni Aggiuntivi</label>
            @foreach ($promo_services as $promo_service)
            <div>
                <span>{{$promo_service->description}}</span>
                <input class="box" type="radio" name="promo_service[]"value="{{$promo_service->id}}">
            </div>
            @endforeach --}}

        </div>
        <input class="box" id="submit" type="submit" value="Submit">
    </form>
</div>
<script src="https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.52.0/maps/maps-web.min.js"></script>
@endsection

@section('script')
<script src="{{asset('js/create.js')}}"></script>
@endsection