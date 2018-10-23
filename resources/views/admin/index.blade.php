@extends('layouts.base')

@section('title')
Bidoofgoo.nl
@endsection

@section('content')
<article>
   <h2>Admin page</h2>
   <div class="artcontent">
      Hey me! This is where you update your projects and pages!<br>
      now get your cute ass to work 💕
   </div>
</admin>
<article>
   <h2>Projects</h2>
   <div class="artcontent">
      <a href="{{url('/admin/makeproject')}}">Create a project</a><br>
      <a href="{{url('/admin/projects')}}">All projects</a><br>
      <a href="{{url('/admin/categories')}}">All Categories</a>
   </div>
</admin>
<article>
   <h2>Project pages</h2>
   <div class="artcontent">
      <a href="{{url('/admin/pages')}}">All pages</a><br>
      <a href="{{url('/admin/makepage')}}">Create a page</a>
   </div>
</admin>
@endsection
