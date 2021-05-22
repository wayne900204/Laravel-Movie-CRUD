@extends('layouts.base')

@section('title')
	{{$movie->title}}
@endsection

@section('content')
	<h2>{{$movie->year}}</h2>
	<p>{{$movie->summary}}</p>
    <p>{{$movie->title}}</p>
    <p>{{$movie->film_director}}</p>
	<a href="{{route('movies.index')}}">Home</a>
@endsection
