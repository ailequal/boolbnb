@extends('layouts.boolbnb')

@section('main')

<div class="search-interface">
	<div class="second_navbar">
		<div class="typology">
			<label for="text">
				<p class="category">Entro: </p>
			</label>
			<select id="radius">
				<option value="10">10 Km</option>
				<option class="default" value="20" selected="20">20 Km</option>
				<option value="30">30 Km</option>
				<option value="40">40 Km</option>
				<option value="50">50 Km</option>
			</select>
		</div>

		<div class="typology">
			<label for="text">
				<p class="category">Letti: </p>
			</label>
			<select id="beds">
				<option class="default" value="" selected>--</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
			</select>
		</div>

		<div class="typology">
			<label for="text">
				<p class="category">Stanze: </p>
			</label>
			<select id="rooms">
				<option class="default" value="" selected>--</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
				<option value="13">13</option>
				<option value="14">14</option>
				<option value="15">15</option>
			</select>
		</div>


	</div>

	<div class="extra-services">
		<h3 class="services">Soggiorno con Servizi Extra: </h3>
		<ul>
			<li>
				<label for="wifi"><a class="icone_space" href="#"><i class="icone fas fa-wifi"></i></a> Wi Fi </label>
				<input id="wifi" type="checkbox" name="wifi">
			</li>
			<li>
				<label for="smoking"><a href="#"><i class="icone fas fa-smoking"></i></a> Area fumatori </label>
				<input id="smoking" type="checkbox" name="smoking">
			</li>
			<li>
				<label for="parking"><a href="#"><i class=" icone fas fa-parking"></i></a> Parcheggio </label>
				<input id="parking" type="checkbox" name="parking">
			</li>
			<li>
				<label for="swimming-pool"><a href="#"><i class="icone fas fa-swimming-pool"></i></a> Piscina </label>
				<input id="swimming-pool" type="checkbox" name="swimming-pool">
			</li>
			<li>
				<label for="breakfast"><a href="#"><i class="icone fas fa-coffee"></i></a> Colazione </label>
				<input id="breakfast" type="checkbox" name="breakfast">
			</li>
			<li>
				<label for="view"><a href="#"><i class="icone fas fa-archway"></i></a> Camera con vista</label>
				<input id="view" type="checkbox" name="view">
			</li>
		</ul>
	</div>

	{{-- <input type="button" value="Ricerca avanzata" class="filter"> --}}

</div>


<div class="flatsPromo">
</div>
<div class="flats ">
    {{-- lista tutti flat --}}
</div>
<input id="city" type="hidden" value="{{$data['city']}}">
{{-- handlebars --}}
<script id="flat-template" type="text/x-handlebars-template">
    <div class="entry">
    <h1>@{{'title'}}</h1>
    <div class="body">
     <p>@{{'city'}}</p>
     <p>@{{'rooms'}}</p>
    </div>
  </div>
</script>
<script id="flatPromo-template" type="text/x-handlebars-template">
    <div class="entry" style="background-color:red;">
    <h1>@{{'title'}}</h1>
    <div class="body">
     <p>@{{'city'}}</p>
     <p>@{{'rooms'}}</p>
    </div>
  </div>
</script>
<script src="{{asset('js/search.js')}}"></script>
@endsection
