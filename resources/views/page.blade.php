@extends('layouts.base')

@section('title')
{{$page->title}} - Bidoofgoo.nl
@endsection

@section('content')
{!!html_entity_decode($page->content)!!}
@if($page->project_id != null)
<script type="text/javascript">
      upClick({{$page->project_id}});
</script>
@endif
@endsection
