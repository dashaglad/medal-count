@extends('layouts.main')
@section('content')
    <h2>Medal Count</h2>

    @include('country.index', ['countries' => $countries])

    <div class="btn-group" role="group" aria-label="Basic outlined example">
        <a href="{{route('countries.create')}}" class="btn btn-outline-secondary">Add Country</a>
        <a href="{{route('medals.create')}}" class="btn btn-outline-secondary">Add Medal</a>
        <a href="{{route('sports.create')}}" class="btn btn-outline-secondary">Add Sport</a>
        <a href="{{route('athletes.create')}}" class="btn btn-outline-secondary">Add Athletes</a>
    </div>
@endsection
