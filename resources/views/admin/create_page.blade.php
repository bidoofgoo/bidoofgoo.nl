<!DOCTYPE html>
<html>
<head>
   <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Ubuntu+Mono" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="{{asset('style/master.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('style/editor.css')}}">
   <link rel="apple-touch-icon" href="{{asset('img/fav.png')}}">
   <link rel="icon" sizes="192x192" href="{{asset('img/fav.png')}}">
   <link rel="shortcut icon" type="image/png" href="{{asset('img/fav.png')}}">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="{{asset('script/quotes.js')}}" charset="utf-8"></script>
   <title>Creation page</title>
</head>
<body>
   <div class="devider">
<div>
      <div class="error">

      </div>
      <div class="editor">
         <form action="{{url('/admin/createpage')}}" method="post">
            @if($errors->any())
               <h4>wait there are errors</h4>
               {{$errors}}
            @endif
            <h3>Editor</h3>
            <br>
            @csrf
            <table>
               <tr>
                  <td><label for="title">Page title: </label></td>
                  <td><input type="text" name="title" value="{{$title}}"></td>
               </tr>
               @if(!$create)
               <tr>
                  <td>Previous slug: </td>
                  <td><input type="text" name="prevslug" value="{{$slug}}" disabled></td>
               </tr>
               @endif
               <tr>
                  <td><label for="slug">Page slug: </label></td>
                  <td><input type="text" name="slug" value="{{$slug}}"></td>
               </tr>
               <tr>
                  <td><label for="projectid">Project: </label></td>
                  <td>
                     <select class="" name="projectid">
                        <option value="-1">null</option>
                        @foreach($projects as $project)
                           <option value="{{$project->id}}">{!!html_entity_decode($project->name)!!}</option>
                        @endforeach
                     </select>
                  </td>
               </tr>
               <tr>
                  <td>Content:</td>
               </tr>
            </table>
            <textarea id="htmlcontentreal" name="htmlcontent" style="display:none;"></textarea>
            <div id="htmlcontent" contenteditable>
               {{$content}}
            </div>
            <br><br>
            <input type="radio" name="save" value="text"><label for="save"> Save as text only</label>
            <br>
            <input type="radio" name="save" value="textwrite" checked>
            <label for="save">Save in database and as text</label><br>
            <button type="submit" name="button">Submit!</button>
         </form>
      </div>
      </div>
      <div class="previewPage">
         <header>
            <h1>Bidoofgoo.nl</h1>
            <h3 id="quote">Waiting for javascript...</h3>
            <nav>
               <a href="">Home</a>
               <a href="">Projects</a>
               <a href="">Contact</a>
            </nav>
         </header>
         <main id="preview">

         </main>
         <footer>
            <p>&copy; Rick Heemskerk</p>
         </footer>
      </div>
   </div>
   <script src="{{asset('script/editor.js')}}" charset="utf-8"></script>
</body>
</html>
