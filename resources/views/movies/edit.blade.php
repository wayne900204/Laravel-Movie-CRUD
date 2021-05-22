@extends('layouts.base')

@section('pageTitle')
	Modifica film: {{$movie->title}}
@endsection

@section('content')

	@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif

	<form action="{{route('movies.update', ['movie' => $movie->id])}}" method="POST">
		@method('PUT')
		@csrf
		<div class="form-group">
			<label for="cover_image"> Image URL</label>
			<img src="{{$movie->cover_image}}" alt="" style="width: 100px">
			<input type="text" class="form-control" id="cover_image" name="cover_image" placeholder="Image URL" value="{{old('cover_image') ? old('cover_image') : $movie->cover_image}}">
		</div>
		<div class="form-group">
			<label for="title">Title</label>
			<input type="text" class="form-control" id="title" name="title" placeholder="title" value="{{old('title') ? old('title') : $movie->title}}">
		</div>
		<div class="form-group">
			<label for="film_director">Film Director</label>
			<input type="text" class="form-control" id="film_director" name="film_director" placeholder="film Director" value="{{old('film_director') ? old('film_director') : $movie->film_director}}">
		</div>
		<div class="form-group">
			<label for="genres">Genres</label>
			<input type="text" class="form-control" id="genres" name="genres" placeholder="genres" value="{{old('genres') ? old('genres') : $movie->genres}}">
		</div>
		<div class="form-group">
			<label for="summary">Summary</label>
			<textarea class="form-control" id="summary" name="summary" rows="8" placeholder="Summary...">{{old('summary') ? old('summary') : $movie->summary}}</textarea>
		</div>
		<div class="form-group">
			<label for="year">Year</label>
			<select class="form-control" id="year" name="year">
				@for ($i = 1900; $i <= date("Y") + 2; $i++)
					<option value="{{$i}}" {{ old('year') == $i || $movie->year == $i ? 'selected' : '' }}>{{$i}}</option>
				@endfor
			</select>
		</div>

		<button type="submit" class="btn btn-primary">OK</button>
	</form>
@endsection
