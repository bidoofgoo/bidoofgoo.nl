@extends('layouts.base')

@section('title')
   Projects - Bidoofgoo.nl
@endsection

@section('content')
   <div class="PageContents">
      <div class="MainPageContent">
         <article>
            @if ($category == null)
               <h2>All projects</h2>
               <div class="artcontent">
                  <div style="padding-bottom: 2rem;">
                     Hello! These are all the projects I've decided to share with you.
                     If you want to read about my newest project, just click the uppermost project.
                     If you want to select just my schoolwork, regular work or any other category, click one under the categories tab.
                     I sure hope you find a project you like. Don't forget to share my work with your friends and family!
                  </div>
            @else
               <h2>Projects - {{$category->name}}</h2>
               <div class="artcontent">
                  <div style="padding-bottom: 2rem;">
                     {!!html_entity_decode($category->description)!!}
                  </div>
            @endif
               @foreach($projects as $project)
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
                        <div class="">
                           <div class="">
                              {{-- <p class="cardTitle" style="color: {{$project->links[0]->category->color}};">{!!html_entity_decode($project->name)!!}</p> --}}
                              <p class="cardTitle">{!!html_entity_decode($project->name)!!}</p>
                           </div>
                           <p style="color:gray; padding: 0; padding-top: .5rem; padding-left: 1rem; font-size: .75rem;text-align:left;">Released: {{$project->release_date}}</p>
                        </div>
                     </div>
                  </div>
               @endforeach
            </div>
         </article>
      </div>
      <div class="SecondairyPageContent">
         <h2>Categories</h2>
         <div class="artcontent">

            @if ($category != null)
               <div class="sorting" style="color: black;"><a href="{{url('projects/')}}">All</a></div>
            @else
               <div class="sorting"><p style="font-weight: bold; color: black;">All</p></div>
            @endif

            @foreach ($tags as $tag)

               @if (count($tag->links) > 0)
                  @php
                     $activated = 0;
                  @endphp

                  @foreach ($tag->links as $link)
                     @if ($link->project->active)
                        @php
                           $activated = $activated + 1;
                        @endphp
                     @endif
                  @endforeach
                  {{-- <div class="invisibox">
                     <div class="card" onclick="
                        goto('{{url('projects/' . $tag->name)}}');">
                        <p class="cardTitle" style="color: {{$tag->color}}; padding: 1rem !important;">{{$tag->name}}</p>
                     </div>
                  </div> --}}
                  @if ($activated > 0)
                     @php
                        $clickable = True;
                     @endphp
                     @if ($category != null)
                        @if ($tag->id == $category->id)
                           @php
                              $clickable = False;
                           @endphp
                        @endif
                     @endif
                     @if ($clickable)
                        <div class="sorting" style="color: {{$tag->color}};"><a href="{{url('projects/' . $tag->name)}}">{{$tag->name}}</a></div>
                     @else
                        <div class="sorting"><p style="font-weight: bold; color: {{$tag->color}};">{{$tag->name}}</p></div>
                     @endif

                  @endif
               @endif
            @endforeach

         </div>
      </div>
   </div>
@endsection
