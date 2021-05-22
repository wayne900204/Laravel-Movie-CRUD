@extends('layouts.base')

@section('title')
Film Collection List
@endsection

@section('content')
HIHI test
<div class="mb-3 text-right">
    <a href="{{route('movies.create')}}"> <button type="button" class="btn btn-success"> Insert Film</button></a>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th> Image </th>
            <th scope="col"> Title </th>
            <th scope="col"> Film Director </th>
            <th scope="col"> Genres </th>
            <th scope="col"> Detail </th>
        </tr>
    </thead>
    <tbody>
        @foreach($movies as $movie)
        <tr>
            <td>
                <img src="{{$movie->cover_image}}" style="width: 100%" onerror="this.src='https://i.imgur.com/e1nNq95.jpg'">
            </td>
            <td>{{$movie->title}}</td>
            <td>{{$movie->film_director}}</td>

            <td>{{$movie->genres}}</td>
            <td>
                <a href="{{route('movies.show', [ 'movie' => $movie->id ])}}"><button type="button" class="btn btn-primary">Moro Info</button></a>
                <a href="{{route('movies.edit', [ 'movie' => $movie->id ])}}"><button type="button" class="btn btn-success">Edit</button></a>
                <form action="{{route('movies.destroy', [ 'movie' => $movie->id ])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">delete</button>
                </form> 
            </td>

        </tr>
        @endforeach
    </tbody>
</table>
@if (session('message'))
    <div class="alert alert-success" style="position: fixed; bottom: 30px; right: 30px">
        {{ session('message') }}
    </div>
@endif
@endsection
