@extends('layouts.boolbnb')

@section('head')
	<script src="http://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
@endsection

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
						<h4>{{$message->title}}</h4>
						<p class="line-email">
							<span>Ricevuto da</span>:
							{{$message->email}}

							<a id="button" href="#">
							Mostra/Nascondi
							</a>
						</p>
					</div>
					<div id="content-hidden">
						<p class="message-text">"{{$message->message}}"
						</p>
						<p>Appartamento: {{$message->flat->title}}
						</p>
					</div>
				</li>
			@endforeach
		</ul>
	</div>
</div>
{{-- <script type="text/javascript">


function ShowHide(id){
 if(document.getElementById){
  var el=document.getElementById(id);
  el.style.display = (el.style.display=="block") ? "none" : "block";
 }
}

</script> --}}
@endsection

@section('script')
<script src="{{asset('js/message.js')}}"></script>
@endsection
