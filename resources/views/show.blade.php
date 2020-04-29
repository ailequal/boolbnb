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
{{-- @dd($flats->extra_service[1]->name); --}}
{{-- @dd($extras); --}}
<div class="box-cover container">
  <img src="{{asset('storage/' . $flats->cover)}}" alt="Copertina della casa">
</div>
<div class="box-desc container ">
  <div class="box-info">
    
    <h1>{{$flats->title}}</h1>
    <p>{{$flats->flat_address->street}} {{$flats->flat_address->street_number}} - {{$flats->flat_address->city}}</p>
    <p>{{$flats->description}}</p>
  </div>
  <div class="box-services">
    <ul>
      {{-- <li>
 {{$flats->flat_address->street}} </li>
      <li> {{$flats->flat_address->street_number}}
      </li>
      <li>
        {{$flats->flat_address->zip_code}} </li>
      <li> {{$flats->flat_address->city}}
      </li> --}}
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
  {{-- <div class="box-images container"> <div class="image">
<img src="{{asset('storage/' . $flats->cover)}}" alt=""> </div>
<div class="image">
  <img src="{{asset('images/39f74208_original.jpg')}}" alt=""> </div>
<div class="image">
  <img src="{{asset('images/51073698-857a-4b5d-b3c6- a618d02ae82d.jpg')}}" alt="">
</div>
</div> --}}

{{-- container mappa --}}
<div class="box-bottom container">
  <div class="box-map">
    <div id='map' class='map'></div>
  </div>
  <div class="box-extraService">
    <div class="extra-service">
      {{-- <ul class= "extra-list"> --}}
        <h2 class="extra-title">Servizi disponibili</h2>
        @foreach ($flats->extra_service as $key => $extra) 
          <div class='extra-box'>
           {{-- @if($extra->name == 'wifi')
           <span><i class="fas fa-wifi"></i></span>
           @elseif($extra->name == 'smoking')
           <span><i class="fas fa-smoking"></i></span>
           @elseif($extra->name == 'parking')
           <span><i class="fas fa-parking"></i></span>
           @elseif($extra->name == 'swimming pool')
           <span><i class="fas fa-swimming-pool"></i></span>
           @elseif($extra->name == 'breakfast')
           <span><i class="fas fa-coffee"></i></span>
           @elseif($extra->name == 'view')
           <span><i class="fas fa-mountain"></i></span>
           @endif --}}
           
           <h2>@if($extra->name == 'wifi')
            <span><i class="fas fa-wifi"></i></span>
            @elseif($extra->name == 'smoking')
            <span><i class="fas fa-smoking"></i></span>
            @elseif($extra->name == 'parking')
            <span><i class="fas fa-parking"></i></span>
            @elseif($extra->name == 'swimming pool')
            <span><i class="fas fa-swimming-pool"></i></span>
            @elseif($extra->name == 'breakfast')
            <span><i class="fas fa-coffee"></i></span>
            @elseif($extra->name == 'view')
            <span><i class="fas fa-mountain"></i></span>
            @endif{{$extra->name}}</h2>
            <p>In questo appartamento è possibile fare quello scritto sopra</p>
          </div>
        @endforeach

        {{-- @foreach ($extra_services as $extra_service)
        <div>
          <span>{{$extra_service->name}}</span>
          <input type="checkbox" name="extra_service[]"value="{{$extra_service->id}}" {{($flat->extra_service->contains($extra_service->id)) ? 'checked' : ''}}>
        </div>
      @endforeach --}}

        {{-- <li>©</i> {{$flats->extra_service[0]->name}}</li> 
       <li><i class="fas fa-smoking"></i> {{$flats->extra_service[1]->name}}</li>  --}}
      {{-- </ul> --}}
    </div>
    <script>
      $(document).ready(function () {

        // console.log($(".extra-list").html());
        
          // if ($('.extra-name').html() == '<i class="icon"></i> wifi'){
          // $('.icon').addClass("fas fa-wifi"); 
          // }
          if (($('.extra-name').html() == '<i class="icon"></i> smoking')){
            console.log('ciao');
            
            $('.icon').addClass("fas fa-smoking"); 
          }
        
       
        // console.log($('.extra-name').html());
      
      })
    </script>
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

@php
    use Carbon\Carbon;
    $now = Carbon::now();
@endphp

{{-- controllo utente autenticato e se ha flat suo e se e' vuota la promo --}}
@if (Auth::check() && Auth::User()->id == $flats->user_id && !empty($flats->promo_service[0]) == false)
	<form action="{{route('payment.index')}}" method="post">
 @csrf
 @method('POST')
	<span>{{$promos[0]->type}}</span>
	<span>{{$promos[0]->price}}</span>
	<input type="radio" name="price" class="ciao" id="{{$promos[0]->id}}" value="{{$promos[0]->price}}">
	

	<span>{{$promos[1]->type}}</span>
	<span>{{$promos[1]->price}}</span>
	<input type="radio" name="price" class="ciao" id="{{$promos[1]->id}}" value="{{$promos[1]->price}}">

	<span>{{$promos[2]->type}}</span>
	<span>{{$promos[2]->price}}</span>
	<input type="radio" name="price" class="ciao" id="{{$promos[2]->id}}" value="{{$promos[2]->price}}">
<input type="hidden" name="flat_id" value="{{$flats->id}}">
	<input type="submit" value="Paga" class="hidden" id="bottone">
</form>
@endif


{{-- controllo utente autenticato e se ha flat suo e se e' non e' vuota la promo --}}
@if (Auth::check() && Auth::User()->id == $flats->user_id && !empty($flats->promo_service[0]) == true)

		@if ($flats->promo_service[0]->pivot->end < $now)
			<form action="{{route('payment.index')}}" method="post">
 @csrf
 @method('POST')
	<span>{{$promos[0]->description}}</span>
	<span>{{$promos[0]->price}}</span>
	<input type="radio" name="price" class="ciao" id="{{$promos[0]->id}}" value="{{$promos[0]->price}}">
	

	<span>{{$promos[1]->description}}</span>
	<span>{{$promos[1]->price}}</span>
	<input type="radio" name="price" class="ciao" id="{{$promos[1]->id}}" value="{{$promos[1]->price}}">

	<span>{{$promos[2]->description}}</span>
	<span>{{$promos[2]->price}}</span>
	<input type="radio" name="price" class="ciao" id="{{$promos[2]->id}}" value="{{$promos[2]->price}}">
<input type="hidden" name="flat_id" value="{{$flats->id}}">
	<input type="submit" value="Paga" class="hidden" id="bottone">
</form>
		@endif

@endif

{{-- @endif --}}
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