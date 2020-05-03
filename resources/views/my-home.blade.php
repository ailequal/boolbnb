@extends('layouts.boolbnb')
 @section('main')
{{-- PROVA CAROSELLO --}}
<div class="jumbotron">
  <div class="promo-title">
    <h1>Dove ti porterà il tuo prossimo viaggio?</h1>
  </div>
  <div class="image-contatiner">
    <img src="{{asset('storage/images/il-tuo-prossimo-viaggio.jpg')}}"alt="Copertina">
    <h2 class="destination">Scoprilo con noi</h2>
  </div>
</div>

<div class="container">
  {{-- CAROSELLO --}}
  <div class="container-carousel">
    <div class="promo">
      <h2>Ti presentiamo i nostri appartamenti in evidenza</h2>
    </div>
    <div class="box-carousel">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          @php
            $i = 0;
          @endphp
          @foreach ($flatsPromo as $promo)
            @if ($i == 0)
              <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" class="active"></li>
              @else
              <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" class=""></li>
            @endif
        @php
          $i++;
        @endphp
        @endforeach
      </ol>

        <div class="carousel-inner">
          @php
            $i = 0;
          @endphp
          @foreach ($flatsPromo as $promo)
            @if ($i == 0)
              <div class="carousel-item active">
              @else
              <div class="carousel-item">
            @endif
            <a href="{{route('show.flat', $promo->slug)}}">
              <img class="d-block w-100 img-fluid" src="{{asset('storage/' . $promo->cover)}}" alt="Copertina della casa">
              <div class="carousel-caption d-none d-md-block">
                  <h4>{{$promo->title}}</h4>
                  {{-- <p>{{$promo->rooms}}</p>
                  <p>{{$promo->mq}}</p> --}}
              </div>
              {{-- <img src="{{asset('storage/' . $promo->cover)}}" alt="Copertina della casa"> --}}
           </a>
          </div>
          {{-- <div class="carousel-item">
            <img class="d-block w-100" src="{{asset('images/appartamenti-porto-recanati_03.jpg')}}" alt="Second slide">
          </div> --}}
          {{-- <div class="carousel-item">
            <img class="d-block w-100" src="{{asset('images/chalet-cortina.jpg')}}" alt="Third slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{asset('images/appartamenti-porto-recanati_04.jpg')}}" alt="Fourth slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{asset('images/Lago-Appartamento-Store-Arnhem-1.jpg')}}" alt="Fifth slide">
          </div> --}}
          @php
            $i++;
          @endphp
          @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </div>
</div>

{{-- JUMBOTRON FLAT --}}
<div class="jumbotron">
  <h2>Vieni a scoprire altri appartamenti</h2>
  <div class="container promo">
    <div class="row">
          @foreach ($flats as $flat)
          <a href="{{route('show.flat', $flat->slug)}}">
            <div class="box-flat">
              {{-- <img src="{{asset('images/world.jpg')}}" alt=""> --}}
              <div>
                <img src="{{asset('storage/' . $flat->cover)}}" alt="Copertina della casa">
              </div>
              <div class="flat-info">
                <h3>{{$flat->title}}</h3>
                <p class="ellipsis">{{$flat->description}}</p>
              </div>
            </div>
          </a>
          @endforeach
    </div>
  </div>
</div>
@endsection


  {{-- PROVE --}}
  {{-- <h1>promo flats</h1>
   @foreach ($flatsPromo as $promo)
     <div>
        <p>{{$promo->title}}</p>
        <p>{{$promo->rooms}}</p>
        <p>{{$promo->mq}}</p>
      </div>
     @endforeach
     <h1>normali</h1>
     @foreach ($flats as $flat)
     <div>
        <p>{{$flat->title}}</p>
        <p>{{$flat->rooms}}</p>
        <p>{{$flat->mq}}</p>
      </div>
     @endforeach --}}
