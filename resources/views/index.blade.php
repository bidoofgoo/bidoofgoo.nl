@extends('layouts.base')

@section('title')
   Bidoofgoo.nl
@endsection

@section('content')
   <article id="me">
      <h2>About me</h2>
      <div class="bout">
         <div class="boutleft"></div>
         <div class="boutright">
            <h1>Hello people, I'm <i>Rick</i>!</h1>
            <p>
               <!-- I'm just some 21 year old computer science guy that likes to make things in his spare time.
               The stuff I create usually consists out of one of the following: art, games, animations, websites and computery programs.
               If you're interested in me or what I do, take a look around this page!<br><br>
               I sure hope you like what I've done with it. -->
               Hello there, it appears you have stumbled upon my site!
               Let me show you around for a bit. <br>
               My name is <b>Rick Heemskerk</b>, I'm <b>21</b> years old and I'm located at a little country called <b>Holland</b>.
               <br><br>
               Currently I'm studying to get my bachelor of computer science at the city of Leiden.
               They give me all kinds of projects to work on, but the joke is on them because I actually like doing it!
               I spend most of my time working on all kinds of projects, mainly my own.
               These projects are usually:
               <ul>
                  <li>✏️ <b>Art</b>: I <strike>hecking</strike> love drawing!</li>
                  <li>💻 <b>Software, Apps & Websites</b>: I have a passion for programming and I'm always trying to learn new things.</li>
                  <li>👾 <b>Games</b>: Who doesn't love games? This combines both programming and drawing and I love it.</li>
               </ul><br>
               If you're interested in the stuff I've created, be sure to stick around!
               I sure hope you like what you'll find.
            </p>
         </div>
      </div>
   </article>
   <article id="cards">
      <h2>Most Viewed Projects</h2>
      <div class="cards">
         @foreach($projectsviews as $project)
            <div class="invisibox">
               @if($project->page != null)
                  <div class="card" onclick="
                  goto('{{url('project/'.$project->page->slug)}}');">
               @else
                  <div class="card" onclick="
                  if('{{$project->url}}'.indexOf('/') != 0){
                     upClick({{$project->id}});
                     openNewTab('{{$project->url}}');
                  }else{
                     goto('{{url($project->url)}}');}">
                  @endif
                  <img src="{{asset('img/projects/' . $project->image)}}">
                  <p class="cardTitle">{!!html_entity_decode($project->name)!!}</p>
                  <div class="tags">
                     @foreach($project->links as $tag)
                        <span class="tag" style="background-color: {{$tag->category->color}}">{{$tag->category->name}}</span>
                     @endforeach
                  </div>
               </div>
            </div>
         @endforeach
      </div>
   </article>
   {{-- <article class="contactmenowples">
      <h2>Contact me!</h2>
      <div class="artcontent">
         Do you have a burning question that you just need the answer to? Worry not! I can probably help you!
         Just click the button below to get the information you need.
         <br><br>
         <div class="button" onclick="goto('{{url("/contact")}}')">
            Contact page
         </div>
      </div>
   </article> --}}
@endsection
