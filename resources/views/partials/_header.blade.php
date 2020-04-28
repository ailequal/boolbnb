<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
    integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
  @yield('head')
  <title></title>
</head>

<body>
  <header class="container">
    <nav>
      <div class="nav-left">
      <a href="{{route('my-home')}}">Boolbnb</a>
      </div>
      <div class="nav-right">
        <ul>
          <li>
          <form action="{{route('search')}}" method="POST">
              @csrf
              @method('POST')
              <input id="search-bar" class="search-bar" type="text" name="city" value="">
              <input type="submit" class="btn btn-primary" value="Cerca">
            </form>
          </li>
          @if (Route::has('login'))
          @auth
          <li>
            <a class="btn btn-primary" href="{{ url('/home') }}">Home</a>
          </li>
          @else
          <li>
            <a class="btn btn-primary" href="{{ route('login') }}">Accedi</a>
          </li>
          @if (Route::has('register'))
          <li>
            <a class="btn btn-primary" href="{{ route('register') }}">Registrati</a>
          </li>
          @endif
          @endauth
      </div>
      @endif
      </ul>
      </div>
    </nav>

    <div class="search-mobile">
      <input class="search-bar" type="text" name="" value="">
      <button class="search" type="button" name="button">Cerca</button>
    </div>


  </header>