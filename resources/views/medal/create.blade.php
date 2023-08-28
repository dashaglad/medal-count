@extends('layouts.main')
@section('content')
    <div class="mt-2">
        <a href="{{route('home')}}"
           class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">< Back to
            Home</a>
    </div>

    <div class="mt-2">
        <h2>Add Medal</h2>
    </div>

    <form method="post" action="{{route('api.medals.create')}}" class="my-2">

        <div class="form-floating my-2">
            <select class="form-select" required name="type" aria-label="Floating label select example"
                    oninvalid="this.setCustomValidity('Select Medal Type Here')"
                    oninput="this.setCustomValidity('')">
                <option selected value="{{null}}">Open this select menu</option>
                <option value="gold">Gold</option>
                <option value="silver">Silver</option>
                <option value="bronze">Bronze</option>
            </select>
            <label>Select Medal Type</label>
        </div>

        <div class="form-floating my-2">
            <select class="form-select" required name="athleteId" aria-label="Floating label select example"
                    oninvalid="this.setCustomValidity('Select An Athlete Here')"
                    oninput="this.setCustomValidity('')">
                <option selected value="{{null}}">Open this select menu</option>
                @foreach($athletes as $athlete)
                    <option value={{$athlete->id}}>{{$athlete->name}} - {{$athlete->country->title}}</option>
                @endforeach
            </select>
            <label>Select An Athlete</label>
        </div>

        <div class="form-floating my-2">
            <select class="form-select" required name="sportId" aria-label="Floating label select example"
                    oninvalid="this.setCustomValidity('Select the Sport Here')"
                    oninput="this.setCustomValidity('')">
                <option selected value="{{null}}">Open this select menu</option>
                @foreach($sports as $sport)
                    <option value={{$sport->id}}>{{$sport->title}}</option>
                @endforeach
            </select>
            <label>Select Sport Type</label>
        </div>

        <button type="submit" class="btn btn-outline-secondary my-2">Add</button>
    </form>

    @include('medal.edit', ['medals' => $medals])

@endsection


