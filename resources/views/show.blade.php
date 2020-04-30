@extends('layouts.boolbnb')
@section('head')
<link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.52.0/maps/maps.css'/>
<script src="http://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
@endsection
@section('main')
<div>
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error) <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div> @endif
</div>
<div>
  @if (isset($status)) @dd($status); {{$status}}
  @endif
</div>
<div class="box-cover container">
  <img src="{{asset('storage/' . $flats->cover)}}" alt="Copertina della casa">
</div>

{{-- container promo --}}
<div class="box-promo container">
  
  @php
    use Carbon\Carbon;
    $now = Carbon::now();
@endphp

{{-- controllo utente autenticato e se ha flat suo e se e' vuota la promo --}}
@if (Auth::check() && Auth::User()->id == $flats->user_id && !empty($flats->promo_service[0]) == false)
<div>
  <h1>Ciao {{Auth::user()->name}}, hai già pensato di mettere in risalto il tuo appartamento? </h1>
</div>
<div>
  <form action="{{route('payment.index')}}" method="post" class="promo-form">
 @csrf
 @method('POST')
  
    <span>{{$promos[0]->type}}</span>
    <span>{{$promos[0]->price}}€</span>
    <input type="radio" name="price" class="ciao" id="{{$promos[0]->id}}" value="{{$promos[0]->price}}">
  
  
  
    <span>{{$promos[1]->type}}</span>
    <span>{{$promos[1]->price}}€</span>
    <input type="radio" name="price" class="ciao" id="{{$promos[1]->id}}" value="{{$promos[1]->price}}">
  
 
    <span>{{$promos[2]->type}}</span>
    <span>{{$promos[2]->price}}€</span>
    <input type="radio" name="price" class="ciao" id="{{$promos[2]->id}}" value="{{$promos[2]->price}}">
    <input type="hidden" name="flat_id" value="{{$flats->id}}">
  
  <input type="submit" value="Vai al pagamento" class="hidden" class="btn btn-primary" id="bottone">
</div>
</form>
@endif


{{-- controllo utente autenticato e se ha flat suo e se e' non e' vuota la promo --}}
@if (Auth::check() && Auth::User()->id == $flats->user_id && !empty($flats->promo_service[0]) == true)

    @if ($flats->promo_service[0]->pivot->end < $now)
      <form action="{{route('payment.index')}}" method="post">
 @csrf
 @method('POST')
  <span>{{$promos[0]->description}}</span>
  <span>{{$promos[0]->price}}€</span>
  <input type="radio" name="price" class="ciao" id="{{$promos[0]->id}}" value="{{$promos[0]->price}}">
  

  <span>{{$promos[1]->description}}</span>
  <span>{{$promos[1]->price}}€</span>
  <input type="radio" name="price" class="ciao" id="{{$promos[1]->id}}" value="{{$promos[1]->price}}">

  <span>{{$promos[2]->description}}</span>
  <span>{{$promos[2]->price}}€</span>
  <input type="radio" name="price" class="ciao" id="{{$promos[2]->id}}" value="{{$promos[2]->price}}"><br>
  <input type="hidden" name="flat_id" value="{{$flats->id}}">
  <input type="submit" value="Vai al pagamento" class="hidden" id="bottone">
</form>
    @endif

@endif
</div>

{{-- container main --}}
<div class="box-desc container ">

  {{-- box info appartamento --}}
  <div class="box-info">
    <h2 id="title">{{$flats->title}}</h2>
    <p>{{$flats->flat_address->street}} {{$flats->flat_address->street_number}} - {{$flats->flat_address->city}}</p>
    <p>{{$flats->description}}</p>
  </div>
  <div class="box-services">
    <ul>
      <li>
        <i class="fas fa-home"></i> Stanze: {{$flats->rooms}}
      </li>
      <li>
        <i class="fas fa-ruler-combined"></i> Metratura: {{$flats->mq}}
      </li>
      <li>
        <i class="fas fa-bed"></i> Posti letto disponibili: {{$flats->beds}}
      </li>
      <li>
        <i class="fas fa-toilet"></i> Bagni disponibili: {{$flats->bathrooms}}
      </li>
      <li>
        <i class="fas fa-dollar-sign"></i> Prezzo per giorno: {{$flats->price_day}}
      </li>
    </ul>
  </div>
</div>
<div>

{{-- container mappa --}}
<div class="box-bottom container">
  <div class="box-map">
    <div id='map' class='map'></div>
  </div>
  {{-- box extra-service --}}
  <div class="box-extraService">
    <div class="extra-service">
        <h2 class="extra-title">Servizi disponibili</h2>
        @foreach ($flats->extra_service as $key => $extra) 
          <div class='extra-box'>
           <h2>@if($extra->name == 'wifi')
            <span><i class="fas fa-wifi"></i></span>
            @elseif($extra->name == 'smoking')
            <span><i class="fas fa-smoking"></i></span>
            @elseif($extra->name == 'parking')
            <span><i class="fas fa-parking"></i></span>
            @elseif($extra->name == 'swimming_pool')
            <span><i class="fas fa-swimming-pool"></i></span>
            @elseif($extra->name == 'breakfast')
            <span><i class="fas fa-coffee"></i></span>
            @elseif($extra->name == 'view')
            <span><i class="fas fa-mountain"></i></span>
            @endif{{$extra->name}}</h2>
            <p>In questo appartamento è possibile fare quello scritto sopra</p>
          </div>
        @endforeach

        
    </div>
  </div>
</div>

{{-- se l'utente ha questo appartamento, niente box messaggi --}}
@if (Auth::check() && Auth::User()->id == $flats->user_id)
{{-- container messaggi --}}
@else
  <div class="mex-container">
    <div class="box-message">
      <form action="{{route('message.store')}}" method="POST"> @csrf
        @method('POST')
        <h2>Scrivi al proprietario</h2>
        <div class="form-group">
          <label class='label' for="title">Titolo</label>
          <input class='input' type="text" name='title' placeholder="Titolo" value="{{old('title')}}">
        </div>
        <div class="form-group">
          <label class='label' for="email">Email</label>
          <input class='input' type="text" name='email' placeholder="Email"
            value="{{(Auth::user()) ? Auth::user()->email : old('email')}}">
        </div>
        <div class="form-group">
          <label class='label' for="message">Messaggio</label>
          <input class='input' type="text" name='message' placeholder="Messaggio" value="{{old('message')}}">
        </div>
        <input type="hidden" name="id" value="{{$flats->id}}"> <input class='submit' type="submit" value="Submit">
      </form>
    </div>
  </div>

@endif



<script>
  $(document).ready(function () {
    $(document).on('click', '.ciao', function () {
      if ($('#1').is(':checked') || $('#2').is(':checked') || $('#3').is(':checked')) {
        $('#bottone').removeClass('hidden');
        $('#bottone').addClass('submit');
      }
    })
  })
</script>
</div>
{{-- script e input hidden --}}
<input id="flatId" type="hidden" value="{{$flats->id}}">
<script src="https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.52.0/maps/maps-web.min.js"></script>
@endsection

@section('script')
<script src="{{asset('js/show.js')}}"></script>
@endsection