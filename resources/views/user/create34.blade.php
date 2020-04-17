<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
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
    <form action="{{route('account.flats.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="form-group">
          <label for="title">Title</label>
          <input class="form-control" type="text" name="title">
        </div>

        <div class="form-group">
          <label for="address">Address</label>
          <input type="text" class="form-control" name="address" id="address">
        </div>
        
        <div class="form-group">
          <label for="rooms">Room Number</label>
          <input type="text" name="rooms" id="rooms" class="form-control" >
        </div>

        <div class="form-group">
          <label for="mq">mq</label>
          <input type="text" name="mq" id="mq" class="form-control" >
        </div>
        
        <div class="form-group">
            <label for="guest">Numero Ospiti</label>
            <input type="text" name="guest" id="guest" class="form-control" >
        </div>

        <div class="form-group">
            <label for="price_day">Prezzo per Notte</label>
            <input type="text" name="price_day" id="price_day" class="form-control" >
        </div>
        
        <label for="description">description</label>
        <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
        
        <label for="bathrooms">bathrooms</label>
        <input type="text" name="bathrooms" id="bathrooms" class="form-control">

        <div class="form-group">
            <label for="beds">Numero di Letti</label>
            <input type="text" name="beds" id="beds" class="form-control" >
        </div>

        <div class="form-group">
            <label for="hidden">Nascosto</label>
            
              <div>
                <span>Yes</span>
                <input type="radio" name="hidden"value="1">
              </div>
              <div>
                <span>No</span>
                <input type="radio" name="hidden"value="0" >
              </div>
          </div>

          <div class="form-group">
            <input type="file" name="cover" id="cover" accept="image/*">
         </div>
          
         <div class="form-group">
            <label for="extra_service">Servizi Aggiuntivi</label>
            @foreach ($extra_services as $extra_service)
              <div>
                <span>{{$extra_service->name}}</span>
                <input type="checkbox" name="extra_service[]"value="{{$extra_service->id}}">
              </div>
            @endforeach

          </div>

         <div class="form-group">
            <label for="promo_service">Promozioni Aggiuntivi</label>
            @foreach ($promo_services as $promo_service)
              <div>
                <span>{{$promo_service->description}}</span>
                <input type="checkbox" name="promo_service[]"value="{{$promo_service->id}}">
              </div>
            @endforeach

          </div>

        <button class="btn btn-success" type="submit">Salva</button>
      </form>
    </div>
  </div>
</body>
</html>
