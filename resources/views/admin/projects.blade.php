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
      <h2>Projects</h2>
      <div class="artcontent">
         <table>
            <tr>
               <th>ID</th>
               <th>Name</th>
               <th>Page</th>
               <th>Alt Url</th>
               <th>Image</th>
               <th>Clicks</th>
               <th>Released</th>
               <th>Active</th>
               <th></th>
               <th>Edit</th>
               <th>Delete</th>
            </tr>
            @foreach ($projects as $project)
               <tr>
                  <td>{{$project->id}}</td>
                  <td>{{$project->name}}</td>
                  @if ($project->page != null)
                     <td><a href="{{url('/project/' . $project->page->slug)}}">Page</a></td>
                  @else
                     <td>None</td>
                  @endif
                  <td><a href="{{$project->url}}">Url</a></td>
                  <td>{{$project->image}}</td>
                  <td>{{$project->clicks}}</td>
                  <td>{{$project->release_date}}</td>
                  @if ($project->active == True)
                     <td>Active</td>
                     <td><div class="button" onclick="goto('{{url('admin/activate' . $project->id)}}')">
                        Deactivate
                     </div></td>
                  @else
                     <td>Inactive</td>
                     <td><div class="button" onclick="goto('{{url('admin/activate' . $project->id)}}')">
                        Activate
                     </div></td>
                  @endif
                  <td>
                     <a href="{{url('admin/makeProject/' . $project->id)}}">Edit</a>
                  </td>
                  <td>
                     <a href="{{url('admin/deleteProject/' . $project->id)}}">Delete</a>
                  </td>
               </tr>
            @endforeach
         </table>
         <table>
            <tr>
               <td>
                  <div class="button" onclick="goto('{{url('admin/makeproject')}}')">
                     Create new
                  </div>
               </td>
               <td>
                  <div class="button" onclick="goto('{{url('admin/activateAll')}}')">
                     Activate All
                  </div>
               </td>
            </tr>
         </table>
      </div>
   </article>
   <article>
      <h2>All</h2>
      <div class="artcontent">
         <a href="{{url('/admin')}}">Admin page</a><br>
         <a href="{{url('/admin/makeproject')}}">Create a project</a><br>
         <a href="{{url('/admin/categories')}}">Categories</a>
      </div>
   </admin>
@endsection
