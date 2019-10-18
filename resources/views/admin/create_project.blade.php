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
   <script type="text/javascript">
      var imagepath = '{{asset('img/projects/')}}/';

      function changeTitles(newTitle){
         let titles = document.getElementsByClassName('cardTitle');
         for (var i = 0; i < titles.length; i++) {
            titles[i].innerHTML = newTitle;
         }
      }
      function changeImage(newTitle){
         let titles = document.getElementsByTagName('img');
         for (var i = 0; i < titles.length; i++) {
            titles[i].src = imagepath + newTitle;
         }
      }
      function changeAlturl(newUrl){
         let iframe = document.getElementsByTagName('iframe')[0];
         iframe.src = newUrl;
      }

      function changeDate(newDate){
         let datespot = document.getElementById('datespot');
         datespot.innerHTML = "Released: " + newDate;
      }
   </script>
   <title>Creation page</title>
</head>
<body>
   <div class="devider">
<div>
      <div class="error">

      </div>
      <div class="editor">
         <form action="{{url('/admin/createproject')}}" method="post">
            @if($errors->any())
               <h4>wait there are errors</h4>
               {{$errors}}
            @endif
            <h3>Editor</h3>
            <br>
            @csrf
            <table>
               @if(!$create)
               <tr>
                  <td>Editing: {{$title}}</td>
                  <td><input type="text" name="id" value="{{$id}}" readonly></td>
               </tr>
               @else
                  <tr style="display:none;">
                     <td>Creating: </td>
                     <td><input type="text" name="id" value="0" readonly></td>
                  </tr>
               @endif
               <tr>
                  <td><label for="title">Project title: </label></td>
                  <td><input type="text" name="title" value="{{$title}}" onchange="changeTitles(this.value)"></td>
               </tr>
               <tr>
                  <td><label for="image">Project image:</label></td>
                  <td><input type="text" name="image" value="{{$image}}" onchange="changeImage(this.value)"></td>
               </tr>
               <tr>
                  <td><label for="date">Release Date:</label></td>
                  <td>
                     <input type="date" name="date" value="{{$date}}" onchange="changeDate(this.value)">
                  </td>
               </tr>
               <tr>
                  <td><label for="image">Alt url:</label></td>
                  <td><input type="text" name="alturl" value="{{$alturl}}" onchange="changeAlturl(this.value)"></td>
               </tr>
               <tr>
                  <td>&nbsp;</td>
               </tr>
               <tr>
                  <th>Categories</th>
               </tr>
               @foreach ($tags as $tag)
                  <tr>
                     <td><input type="checkbox" name="tags[]" value="{{$tag->id}}" onchange="console.log(this.checked);if(this.checked){document.getElementById('tag{{$tag->id}}').style.display = 'block'}else{document.getElementById('tag{{$tag->id}}').style.display = 'none'}"
                        @foreach ($activeTags as $acTag)
                           @if ($acTag->category_id == $tag->id)
                              checked
                           @endif
                        @endforeach
                        ></td>
                     <td>{{$tag->name}}</td>
                  </tr>
               @endforeach
            </table>
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
            <article id="cards">
               <h2>Most Viewed Projects</h2>
               <div class="cards">
                     <div class="invisibox">
                           <div class="card">
                           <img src="{{asset('img/projects/' . $image)}}">
                           <p class="cardTitle">{{$title}}</p>
                           <div class="tags">
                              @foreach($tags as $tag)
                                 @php
                                    $found = False;
                                 @endphp
                                 <span class="tag" id="tag{{$tag->id}}" style="background-color: {{$tag->color}};
                                 @foreach ($activeTags as $acTag)
                                    @if ($acTag->category_id == $tag->id)
                                       @php
                                          $found = True;
                                       @endphp
                                    @endif
                                 @endforeach
                                 @if (!$found)
                                    display:none;
                                 @endif
                                 ">{{$tag->name}}</span>
                              @endforeach
                           </div>
                        </div>
                     </div>
                     <div class="invisibox">
                        <div class="card">
                           <iframe src="{{$alturl}}" width="100%" height="100%"></iframe>
                        </div>
                     </div>
               </div>
               <div class="PageContents">
                  <div class="MainPageContent">
                     <article>

                           <h2>Project bar</h2>

                              <div class="invisibox">
                                    <div class="card">
                                    <img src="{{asset('img/projects/' . $image)}}">
                                    <div class="">
                                       <div class="">
                                          <p class="cardTitle" style="">{{$title}}</p>
                                       </div>
                                       <p id="datespot" style="color:gray; padding: 0; padding-top: .5rem; padding-left: 1rem; font-size: .75rem;text-align:left;">Released: {{$date}}</p>
                                    </div>
                                 </div>
                              </div>
                        </div>
                     </article>
         </main>
         <footer>
            <p>&copy; Rick Heemskerk</p>
         </footer>
      </div>
   </div>
   <script src="{{asset('script/dontleave.js')}}" charset="utf-8"></script>
</body>
</html>
