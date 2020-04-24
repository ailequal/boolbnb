@extends('layouts.boolbnb')

@section('main')


<div class="messages container">
	@foreach ($userMessage as $message)
	<div class="message">
		<h3>{{$message->title}}</h3>
		<h3>{{$message->email}}</h3>
		<h3>{{$message->message}}</h3>
	<h3>{{$message->flat->title}}</h3>
	</div>
	@endforeach
</div>

@endsection