@extends('layouts.boolbnb')
@section('main')
<div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
<form action="{{route('account.flats.update', $flat->slug)}}" method="POST" enctype='multipart/form-data'>
    {{-- token generator --}}
    @csrf
    @method('PATCH')

    <div class="container cont-edit">
        <h2>Modifica il tuo indirizzo</h2>
        <div class= "row">
            <div class="col-lg-6 col-md-12">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group form-box">
                            <label for="title">Titolo</label>
                            <input type="text" name="title" placeholder="Titolo" value="{{$flat->title}}">
                        </div>
                    
                        <div class="form-group form-box">
                            <label for="rooms">Numero stanza</label>
                            <input class="number" type="number" name="rooms" placeholder="Numero stanza" value="{{$flat->rooms}}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group form-box">
                            <label for="mq">Metri quadri</label>
                            <input class="number" type="number" name="mq" placeholder="Metri quadri" value="{{$flat->mq}}">
                        </div>
                    
                        <div class="form-group form-box">
                            <label for="street">Via</label>
                            <input type="text" name="street" placeholder="Via" value="{{$flat->flat_address->street}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class= "col-lg-6 col-md-12">
                <div class="row">
                    <div class= "col-lg-6 col-md-12">
                        <div class="form-group form-box">
                            <label for="street_number">Civico</label>
                            <input class="number" type="text" name="street_number" placeholder="Civico" value="{{$flat->flat_address->street_number}}">
                        </div>
                        <div class="form-group form-box">
                            <label for="city">Città</label>
                            <input type="text" name="city" placeholder="Città" value="{{$flat->flat_address->city}}">
                        </div>
                    </div>
                    <div class= "col-lg-6 col-md-12">
                        <div class="form-group form-box">
                            <label for="zip_code">Cap</label>
                            <input class="number" type="text" name="zip_code" placeholder="Cap" value="{{$flat->flat_address->zip_code}}"> 
                        </div>
                    
                        <div class="form-group form-box insert-img">
                            <span class= "label">
                                <label class= "cover-custom" for="cover">
                                    <input id="cover" type="file" name='cover' accept='image/*'>
                                    Scegli l'immagine di copertina
                                </label>
                                
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <div class="container cont-edit">
       <h2>Modifica le caratteristiche dell'annuncio</h2>
       <div class= "row">
        <div class="col-lg-6 col-md-12">
            <div class="form-group form-box">
                <label for="guest">Numero ospiti</label>
                <input class="number" type="text" name="guest" placeholder="Numero ospiti" value="{{$flat->guest}}">
            </div>
        
            <div class="form-group form-box">
                <label for="description">Descrizione</label>
                <input type="text" name="description" placeholder="Descrizione" value="{{$flat->description}}">
            </div>
        
            <div class="form-group form-box">
                <label for="price_day">Prezzo giornaliero</label>
                <input class="number" type="text" name="price_day" placeholder="Prezzo giornaliero" value="{{$flat->price_day}}">
            </div>
        
          
        
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="form-group form-box">
                <label for="bathrooms">Numero bagni</label>
                <input class="number" type="number" name="bathrooms" placeholder="Numero bagni" value="{{$flat->bathrooms}}">
            </div>

            <div class="form-group form-box">
                <label for="beds">Numero di Letti</label>
                <input class="number" type="number" name="beds" placeholder="Numero letti" value="{{$flat->beds}}">
            </div>
          
        </div>
       </div>
   </div>
   <div class="container cont-edit">
       <h2>Modifica i Servizi</h2>
       <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="form-group form-box">
                <label for="hidden">Nascosto</label>
                <div>
                    <span>Yes</span>
                    <input type="radio" name="hidden"value="1" {{$flat->hidden == 1 ? 'checked' : ''}}>
                </div>
                <div>
                    <span>No</span>
                    <input type="radio" name="hidden"value="0" {{$flat->hidden == 0 ? 'checked' : ''}}>
              </div>
          </div>
            </div>
           <div class="col-lg-6 col-md-12 extra-edit">
            <h3>Servizi extra</h3>

            <div class="form-group form-box extra-service-container-edit">
                <div class = "row">
                    @foreach ($extra_services as $extra_service)
                    <div class="extra_services_box_edit">
                            <span>@if($extra_service->name == 'wifi')
                                <span><i class="fas fa-wifi"></i></span>
                                @elseif($extra_service->name == 'smoking')
                                <span><i class="fas fa-smoking"></i></span>
                                @elseif($extra_service->name == 'parking')
                                <span><i class="fas fa-parking"></i></span>
                                @elseif($extra_service->name == 'swimming_pool')
                                <span><i class="fas fa-swimming-pool"></i></span>
                                @elseif($extra_service->name == 'breakfast')
                                <span><i class="fas fa-coffee"></i></span>
                                @elseif($extra_service->name == 'view')
                                <span><i class="fas fa-mountain"></i></span>
                                @endif{{$extra_service->name}}</span>
                            <span class="checkbox"><input type="checkbox" name="extra_service[]"value="{{$extra_service->id}}"></span>
                        </div>
                    </div>
                    @endforeach
                </div>
       </div>
   </div>
      </div>
    <input type="submit" value="Submit">
</form>
@endsection