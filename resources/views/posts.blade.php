@extends('layouts.app')

@section('title', "JSDEV.nl | Blog Posts")

@section('content')
<h1>Posts</h1>

@if (count($posts) === 0)
	No Blog Posts Found!
@else
	@foreach ($posts as $key => $post)
		<div>{{ $key }}. {{ $post['title'] }} - {{ $post['content'] }}</div>
	@endforeach
@endif
	
@endsection