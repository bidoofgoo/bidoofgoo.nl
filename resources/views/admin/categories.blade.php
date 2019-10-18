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
               <th>Title</th>
               <th>Description</th>
               <th>Color</th>
            </tr>
            @foreach ($tags as $tag)
               <tr>
                  <form action="{{url('admin/postcategory')}}" method="post">
                     <td>
                        @csrf
                        <input type="text" name="id" value="{{$tag->id}}" readonly>
                     </td>
                     <td>
                        <input type="text" name="name" value="{{$tag->name}}">
                     </td>
                     <td>
                        <textarea name="description" rows="5" cols="40">{{$tag->description}}</textarea>
                     </td>
                     <td>
                        <input type="text" style="background-color: {{$tag->color}}; color: white;" name="color" value="{{$tag->color}}" onchange="this.style.backgroundColor = this.value;">
                     </td>
                     <td>
                        <button type="submit">Update</button>
                     </td>
                     <td>
                        <a href="{{url('admin/deletecategory' . $tag->id)}}">Delete</a>
                     </td>
                  </form>
               </tr>
            @endforeach
            <tr>
               <form action="{{url('admin/postcategory')}}" method="post">
                  <td>
                     @csrf
                     <input type="text" name="id" value="0" style="display:none;" readonly>
                  </td>
                  <td>
                     <input type="text" name="name" value="???">
                  </td>
                  <td>
                     <textarea name="description" rows="5" cols="40"></textarea>
                  </td>
                  <td>
                     <input type="text" style="background-color: black; color: white;" name="color" value="???" onchange="this.style.backgroundColor = this.value;">
                  </td>
                  <td>
                     <button type="submit">Create</button>
                  </td>
               </form>
            </tr>
         </table>
      </div>

@endsection
