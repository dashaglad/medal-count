@extends('layouts.main')
@section('content')
    <div class="mt-2">
        <a href="{{route('home')}}" class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">< Back to Home</a>
    </div>

    <div class="mt-2">
        <h2>Add Athlete</h2>
    </div>

    <form method="post" action="{{route('api.athletes.create')}}" class="my-2">
        <div class="my-3">
            <input name="name" class="form-control" required autofocus placeholder="Name"
                   oninvalid="this.setCustomValidity('Enter Athlete Name Here')"
                   oninput="this.setCustomValidity('')">
        </div>

        <div class="form-floating my-2">
            <select class="form-select" required name="countryId" aria-label="Floating label select example"
                    oninvalid="this.setCustomValidity('Choose The Country Here')"
                    oninput="this.setCustomValidity('')">
                <option selected value="{{null}}">Open this select menu</option>
                @foreach($countries as $country)
                    <option value={{$country->id}}>{{$country->title}}</option>
                @endforeach
            </select>
            <label required>Select the Country</label>
        </div>

        <button type="submit" class="btn btn-outline-secondary my-2">Add</button>
    </form>

    @include('athlete.edit', ['athletes' => $athletes])

@endsection


