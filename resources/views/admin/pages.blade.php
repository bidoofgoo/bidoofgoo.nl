@extends('layouts.base')

@section('title')
   Bidoofgoo.nl
@endsection

@section('content')
   <article>
      <style media="screen">
      th, td{
         padding-bottom: .5rem;
         padding-right: 1rem;
         text-align: left;
      }
      </style>
      <h2>Pages</h2>
      <div class="artcontent">
         <table>
            <tr>
               <th>Title</th>
               <th>Slug</th>
               <th>Project</th>
               <th>Show AltUrl</th>
               <th>View page</th>
               <th>Edit page</th>
               <th>Delete page</th>
            </tr>
            @foreach($pages as $page)
               <tr>
                  <td>{{$page->title}}</td>
                  <td>{{$page->slug}}</td>
                  @if($page->project != null)
                     <td>{{$page->project->name}}</td>
                     @if($page->showalturl)
                        <td>Showing, <a href="{{url('/admin/pages/showAlt/' . $page->id )}}">disable</a></td>
                     @else
                        <td>Disabled, <a href="{{url('/admin/pages/showAlt/' . $page->id )}}">show</a></td>
                     @endif
                  @else
                     <td>None</td>
                     <td>NaN</td>
                  @endif
                  <td><a href="{{url('/project/'.$page->slug)}}">View</a></td>
                  <td><a href="{{url('/admin/makepage/'.$page->slug)}}">Edit</a></td>
                  <td><a href="{{url('/admin/deletePage/'.$page->slug)}}">Delete</a></td>
               </tr>
            @endforeach
         </table>
      </div>
   </article>
   <article>
      <h2>All</h2>
      <div class="artcontent">
         <a href="{{url('/admin')}}">Admin page</a><br>
         <a href="{{url('/admin/pages')}}">All pages</a><br>
         <a href="{{url('/admin/makepage')}}">Create a page</a>
      </div>
   </admin>
@endsection
