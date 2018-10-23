@extends('layouts.base')

@section('title')
   {{$page->title}} - Bidoofgoo.nl
@endsection

@section('extraHead')
   <meta property="og:url"           content="{{url()->full()}}" />
   <meta property="og:type"          content="article" />
   <meta property="og:title"         content="{{$page->title}}" />
   <meta property="og:description"   content="Read {{$page->title}} now on Bidoofgoo.nl!" />
   @if ($page->project != null)
      <meta property="og:image"         content="{{asset('img/projects/' . $page->project->image)}}" />
   @else
      <meta property="og:image"         content="{{asset('img/fav.png')}}" />
   @endif
@endsection

@section('content')
   <!-- Load Facebook SDK for JavaScript -->
   <div id="fb-root"></div>
   <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
      fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));</script>
   <div class="PageContents">
      <div class="MainPageContent">
         {!!html_entity_decode($page->content)!!}
      </div>
      <div class="SecondairyPageContent">
         @auth
            <h2>Admin tools</h2>
            <div class="artcontent">
               <a href="{{url('/admin/makepage/'.$page->slug)}}">Edit this page</a>
            </div>
         @endauth
         <h2>Spread the word!</h2>
         <div class="artcontent">
            Hello! I've put a lot of time and effort into this site and I would appreciate it alot if you were to share this page! It helps me spread my work amongst the masses and I'll be forever gratefull! 🙇‍💖<br><br>
            <div class="fb-share-button"
            data-href="{{url()->full()}}"
            data-layout="button_count">
         </div>
      </div>
      <h2 class="SecondairyHead">Similar projects</h2>
      <div class="artcontent">
         @foreach($recommended as $project)
            <div class="invisibox">
               @if($project->page != null)
                  <div class="card" onclick="
                  window.location.href = '{{url('project/'.$project->page->slug)}}';">
               @else
                  <div class="card" onclick="
                  if('{{$project->url}}'.indexOf('/') != 0){
                     upClick({{$project->id}});
                     openNewTab('{{$project->url}}');
                  }else{
                     window.location.href = '{{url($project->url)}}';}">
                  @endif
                  <img src="{{asset('img/projects/' . $project->image)}}">
                  <p class="cardTitle">{!!html_entity_decode($project->name)!!}</p>
               </div>
            </div>
         @endforeach
      </div>
   </div>
</div>
@if($page->project_id != null)
   <script type="text/javascript">
   upClick({{$page->project_id}});
   </script>
@endif
@endsection
