<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>YOU HAVE BEEN DELETETELETED</title>
      <!-- Global site tag (gtag.js) - Google Analytics -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-41956560-1"></script>
      <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-41956560-1');
      </script>
   </head>
   <body style="background-color:black;margin:0;">
      <div style="display:flex;height:100vh;width:100vw;justify-content: center; align-items: center;">
         <div class="">
            <img src="{{asset('img/dancing-skeleton.gif')}}" style="margin-left:auto;margin-right:auto;display:block;">
            <p style="font-family:serif;color:red;font-size:2rem;display:block;">YOU HAVE BEEN DELETED KIDDO</p>
            <a href="{{ route('home') }}">Return to site</a>
         </div>
      </div>
   </body>
</html>
