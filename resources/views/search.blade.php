@extends('layouts.boolbnb')

@section('main')

<div class="search-interface">

	<label for="text">Radius</label>
	<select id="radius">
		<option value="10">10</option>
		<option value="20" selected="20">20</option>
		<option value="30">30</option>
		<option value="40">40</option>
		<option value="50">50</option>
	</select>

	<label for="text">Letti</label>
	<select id="beds">
		<option value="" selected>none</option>
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

	<label for="text">Stanze</label>
	<select id="rooms">
		<option value="" selected>none</option>
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

	<input type="button" value="Ricerca avanzata" class="filter">

	<div class="extra-services">
		<ul>
			<li>
				<label for="wifi">Wi Fi</label>
				<input id="wifi" type="checkbox" name="wifi">
			</li>
			<li>
				<label for="smoking">Area fumatori</label>
				<input id="smoking" type="checkbox" name="smoking">
			</li>
			<li>
				<label for="parking">Parcheggio</label>
				<input id="parking" type="checkbox" name="parking">
			</li>
			<li>
				<label for="swimming-pool">Piscina</label>
				<input id="swimming-pool" type="checkbox" name="swimming-pool">
			</li>
			<li>
				<label for="breakfast">Colazione</label>
				<input id="breakfast" type="checkbox" name="breakfast">
			</li>
			<li>
				<label for="view">Camera con vista</label>
				<input id="view" type="checkbox" name="view">
			</li>
		</ul>
	</div>

</div>


<div class="flats">
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
<script src="{{asset('js/search.js')}}"></script>
@endsection