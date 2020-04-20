@extends('layouts.boolbnb')
 @section('main')
   <div class="box-cover container"></div>
   <div class="box-desc container">
     <div class="box-info">
       <h1>{{$flats->title}}</h1>
       <p>{{$flats->description}}</p>
     </div>
    
     <div class="box-services">
       <ul>
         <li>
           {{$flats->flat_address->street}}
         </li>
         <li>
           {{$flats->flat_address->street_number}}
         </li>
         <li>
           {{$flats->flat_address->zip_code}}
         </li>
         <li>
           {{$flats->flat_address->city}}
         </li>
         <li>
           {{$flats->rooms}}
         </li>
         <li>
           {{$flats->mq}}
         </li>
         <li>
           {{$flats->beds}}
         </li>
         <li>
           {{$flats->price_day}}
         </li>
         <li>
           {{$flats->bathrooms}}
         </li>
       </ul>
     </div>
   </div>

   <div class="box-images container">
     <div class="image">
       <img src="{{asset('storage/' . $flats->cover)}}" alt="">
     </div>
     <div class="image">
       <img src="{{asset('images/39f74208_original.jpg')}}" alt="">
     </div>
     <div class="image">
       <img src="{{asset('images/51073698-857a-4b5d-b3c6-a618d02ae82d.jpg')}}" alt="">
     </div>
   </div>
   <div class="box-bottom container">
     <div class="box-map">
      <div id='map' class='map'></div>
     </div>
     <div class="box-message">
       <form action="" method="POST">
         @csrf
         @method('POST')
         <h3>Scrivi al proprietario</h3>
         <div class="form-group">
           <label for="title">Titolo</label>
           <input type="text" name='title' placeholder="Titolo">
         </div>
         <div class="form-group">
           <label for="email">Email</label>
           <input type="text" name='email' placeholder="Email">
         </div>
         <div class="form-group">
           <label for="message">Messaggio</label>
           <input type="text" name='message' placeholder="Messaggio">
         </div>
         <input type="submit" value="Submit">
       </form>
     </div>
   </div>
   <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.52.0/maps/maps-web.min.js"></script>
    <script>
      var address = [-121.91595, 37.36729];

      tt.setProductInfo('<test>', '<beta>');
      var map= tt.map({
          key: 'RtqGWkFeMT3SHtv3t8oHCVrLAsAtxPLP',
          container: 'map',
          style: 'tomtom://vector/1/basic-main',
          center: address,
          zoom: 15
      });
      var marker = new tt.Marker().setLngLat(address).addTo(map);
      var popupOffsets = {
        top: [0, 0],
        bottom: [0, -70],
        'bottom-right': [0, -70],
        'bottom-left': [0, -70],
        left: [25, -35],
        right: [-25, -35]
      }
      var popup = new tt.Popup({offset: popupOffsets}).setHTML("<b>Speedy's pizza</b><br/>100 Century Center Ct 210, San Jose, CA 95112, USA");
      marker.setPopup(popup).togglePopup();
    </script>
 @endsection
