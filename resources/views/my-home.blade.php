@extends('layouts.boolbnb')
 @section('main')
{{-- PROVA CAROSELLO --}}
<div class="container">
  {{-- CAROSELLO --}}
  <div class="">
    <div class="promo">
      <h1>Scopri i nostri appartamenti in evidenza</h1>
    </div>
    <div class="box-carousel">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="3" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="4" class="active"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="{{asset('images/world.jpg')}}" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{asset('images/appartamenti-porto-recanati_03.jpg')}}" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{asset('images/chalet-cortina.jpg')}}" alt="Third slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{asset('images/appartamenti-porto-recanati_04.jpg')}}" alt="Fourth slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{asset('images/Lago-Appartamento-Store-Arnhem-1.jpg')}}" alt="Fifth slide">
          </div>
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



   <div class="container promo">
     {{-- <h1>Gli appartamenti in evidenza</h1> --}}
     <div class="row">
       <a href="#">
         <div class="box-flat">
           <img src="{{asset('images/world.jpg')}}" alt="">
           <h3>Titolo</h3>
           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
         </div>
       </a>
       <a href="#">
         <div class="box-flat">
           <img src="{{asset('images/world.jpg')}}" alt="">
           <h3>Titolo</h3>
           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
         </div>
       </a>
       <a href="#">
         <div class="box-flat">
           <img src="{{asset('images/world.jpg')}}" alt="">
           <h3>Titolo</h3>
           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
         </div>
       </a>

       <a href="#">
         <div class="box-flat">
           <img src="{{asset('images/world.jpg')}}" alt="">
           <h3>Titolo</h3>
           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
         </div>
       </a>

       <a href="#">
         <div class="box-flat">
           <img src="{{asset('images/world.jpg')}}" alt="">
           <h3>Titolo</h3>
           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
         </div>
       </a>

       <a href="#">
         <div class="box-flat">
           <img src="{{asset('images/world.jpg')}}" alt="">
           <h3>Titolo</h3>
           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
         </div>
       </a>
     </div>
   </div>
</div>

  {{-- PROVE --}}
  <h1>promo flats</h1>
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
     @endforeach
@endsection
