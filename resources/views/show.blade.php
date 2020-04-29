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
<div class="box-cover container">
  <img src="{{asset('storage/' . $flats->cover)}}" alt="Copertina della casa">
</div>
<div class="box-desc container ">
  <div class="box-info">
    <h1>{{$flats->title}}</h1>
    <p>{{$flats->flat_address->street}} - {{$flats->flat_address->city}}</p>
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
    {{-- @dd($promos); --}} <div class="extra-service">
      <ul>
        {{-- <li><i class="fas fa-wifi"></i> {{$flats->extra_service[0]->name}}</li> --}}
        {{-- <li><i class="fas fa-smoking"></i> {{$flats->extra_service[1]->name}}</ li> --}}
      </ul>
    </div>
  </div>
</div>
{{-- container messaggi --}} <div class="mex-container">
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

{{-- Sezione delle promo --}}
@if (Auth::check() && Auth::User()->id == $flats->user_id)
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