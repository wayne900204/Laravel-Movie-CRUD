@extends('layouts.base')

@section('title')
Movie Collection List
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
<form action="{{route('movies.store')}}" method="POST">
    @method('POST')
    @csrf
    <div class form-group>
        <label for="cover_image"> Image URL</label>
        <!-- placeholder == textField hint -->
        <input type="text" class="form-control" id="cover_image" name="cover_image" placeholder="image URL" value="{{ old('cover_image') }}">
    </div>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="title" value="{{ old('title') }}">
    </div>
    <div class="form-group">
        <label for="film_director">Film Director</label>
        <input type="text" class="form-control" id="film_director" name="film_director" placeholder="film Director" value="{{ old('film_director') }}">
    </div>
    <div class="form-group">
        <label for="genres">Genres</label>
        <input type="text" class="form-control" id="genres" name="genres" placeholder="genres" value="{{ old('genres') }}">
    </div>
    <div class="form-group">
        <label for="summary">Summary</label>
        <textarea class="form-control" id="summary" name="summary" rows="8" placeholder="summary...">{{ old('summary') }}</textarea>
    </div>

    <div class="form-group">
        <label for="year">Year</label>
        <select class="form-control" id="year" name="year">
            @for ($i = 2010; $i <= date("Y") + 2; $i++) <option value="{{$i}}" {{ $i == old('year') ? 'selected' : '' }}>{{$i}}</option>
                @endfor
        </select>
    </div>

    <button type="submit" class="btn btn-primary">OK</button>
</form>
<hr>
@endsection
