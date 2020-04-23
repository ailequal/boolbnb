@extends('layouts.boolbnb')

@section('main')

<div class="entry">
	<label for="text">Radius</label>

<select id="radius">
	<option value="10">10</option>
	<option value="20" selected="20">20</option>
	<option value="30">30</option>
	<option value="40">40</option>
	<option value="50">50</option>
</select> 
</div>
</div>


<input id="city" type="hidden" value="{{$data['city']}}">

<div class="search-interface">

</div>

<div class="flats">

</div>

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


