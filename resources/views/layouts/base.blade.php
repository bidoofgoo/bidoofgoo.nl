<!DOCTYPE html>
<html>
<head>
   <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Ubuntu+Mono" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="{{asset('style/master.css')}}">
   <link rel="apple-touch-icon" href="{{asset('img/fav.png')}}">
   <link rel="icon" sizes="192x192" href="{{asset('img/fav.png')}}">
   <link rel="shortcut icon" type="image/png" href="{{asset('img/fav.png')}}">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="{{asset('script/quotes.js')}}" charset="utf-8"></script>
   <title>@yield('title')</title>
   <script type="text/javascript">
      function upClick(id){
         var xhttp = new XMLHttpRequest();
         xhttp.open("GET", "{{url('/upClicks')}}" + "/" + id, true);
         xhttp.send();
      }
   </script>
</head>
<body>
   <header>
      <h1 onclick="window.location.href = '{{url('/')}}';">Bidoofgoo.nl</h1>
      <h3 id="quote">Waiting for javascript...</h3>
      <nav>
         <a href="{{url('/')}}">Home</a>
         <a href="{{url('/')}}#cards">Projects</a>
         <a href="{{url('/')}}#info">Contact</a>
         @auth
         <a href="{{url('/admin')}}">Admin</a>
         @endauth
      </nav>
   </header>
   <main>
      @yield('content')
   </main>
   <footer>
      <p>&copy; Rick Heemskerk</p>
   </footer>
</body>
</html>
