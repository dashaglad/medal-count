@extends('layouts.main')
@section('content')
    <div class="mt-2">
        <a href="{{route('home')}}" class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">< Back to Home</a>
    </div>

    <div class="mt-2">
        <h2>Add Country</h2>
    </div>

    <form method="post" action="{{route('api.countries.create')}}" class="my-2">
        <div class="my-3">
            <input name="title" required class="form-control" autofocus placeholder="Title"
                   oninvalid="this.setCustomValidity('Enter The Country Here')"
                   oninput="this.setCustomValidity('')">
        </div>
        <button type="submit" class="btn btn-outline-secondary my-2">Add</button>
    </form>

    @include('country.edit', ['countries' => $countries])

@endsection


