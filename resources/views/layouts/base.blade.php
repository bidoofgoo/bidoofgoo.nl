<!DOCTYPE html>
<html>
<head>
   <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
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
   function openNewTab(url){
      let tab = window.open(url, '_blank');
      tab.focus();
   }
   function goto(url){
      window.location.href = url;
   }
   </script>

   <!-- Global site tag (gtag.js) - Google Analytics -->
   <script async src="https://www.googletagmanager.com/gtag/js?id=UA-41956560-1"></script>
   <script>
     window.dataLayer = window.dataLayer || [];
     function gtag(){dataLayer.push(arguments);}
     gtag('js', new Date());

     gtag('config', 'UA-41956560-1');
   </script>

   @yield('extraHead')
</head>
<body>
   <header>
      <h1 onclick="window.location.href = '{{url('/')}}';">Bidoofgoo.nl</h1>
      <h3 id="quote">Waiting for javascript...</h3>
   </header>
   <nav>
      <a href="{{url('/')}}">Home</a>
      <a href="{{url('/projects')}}">Projects</a>
      <a href="{{url('/contact')}}">Contact</a>
      @auth
         <a href="{{url('/admin')}}">Admin</a>
      @endauth
   </nav>
   @if(isset($main))
     <div class="banner">
       <div class="banner_back">

       </div>
       <div class="banner_text">
         <h1>Bidoofgoo</h1>
         <h3>Where technology meets creativity</h3>
       </div>
     </div>
   @endif
   <main>
      @yield('content')
   </main>
   <footer>
      <p>&copy; Rick Heemskerk 2018</p>
   </footer>
</body>
</html>
