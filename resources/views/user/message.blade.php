@extends('layouts.boolbnb')
@section('main')
<div class="main-container">
	<div class="head-title">
		<h1>Lista Messaggi</h1>
	</div>

	<div class="messages-box container">
		<ul>
			@foreach ($userMessage as $message)
				<li>
					<div class="message">
						<h2>{{$message->title}}</h2>
						<h4>{{$message->email}}</h4>
						<h4 class="message-text">{{$message->message}}</h4>
						<h4>{{$message->flat->title}}</h4>
					</div>
				</li>
			@endforeach
		</ul>
	</div>

</div>

@endsection
