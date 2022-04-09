@extends('layouts.base')

@section('title')
   Bidoofgoo.nl
@endsection

@section('extraHead')
  <link rel="stylesheet" href="{{asset('style/banner.css')}}">
@endsection

@section('content')
  <div class="banner">
    <div class="banner_back">

    </div>
    <div class="banner_text">
      <h1>Bidoofgoo</h1>
      <h3>Where technology meets creativity</h3>
    </div>
  </div>
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
               Let me tell you what it's about for a bit. <br>
               My name is <b>Rick Heemskerk</b>, I'm <b>{{ $age }}</b> years old and I'm located at a little country called the <b>Netherlands</b>.
               <br><br>
               I have completed my bachelor's degree of computer science at the Leiden University of Applied Sciences, which makes me a Bachelor of Science!
               I spend most of my time working on all kinds of projects, mainly my own.<br><br>
               These projects are usually:
               <ul>
                  <li>✏️ <b>Art</b>: I <strike>hecking</strike> love drawing, painting and sculpting!</li>
                  <li>💻 <b>Software, Apps & Websites</b>: I have a passion for programming and I'm always trying to learn new things.</li>
                  <li>👾 <b>Games</b>: Who doesn't love games? This combines both programming and drawing, making it something I'll gladly do.</li>
                  <li>🎲 <b>TTRPGs</b>: I'm a dungeon master and I like to make all sorts of miniatures and trinkets to enhance my games!</li>
               </ul><br>
               If you're interested in the stuff I've created, be sure to stick around!
               I'm sure you'll find something you will like.
            </p>
         </div>
      </div>
   </article>
   <article id="cards">
      <h2>Check out my work!</h2>
      <div class="cards">
         @foreach($projectsdate as $project)
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
                     {{-- @foreach($project->links as $tag)
                        <span class="tag" style="background-color: {{$tag->category->color}}">{{$tag->category->name}}</span>
                     @endforeach --}}
                  </div>
               </div>
            </div>
         @endforeach

      </div>
      <div class="artcontent bottom-right" style="padding-bottom: 2rem; padding-top: 0rem;">
         <a href="{{url('/projects')}}">More...</a>
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
