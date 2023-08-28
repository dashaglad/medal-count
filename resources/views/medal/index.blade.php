@extends('layouts.main')
@section('content')

    <div class="mt-2">
        <a href="{{route('home')}}"
           class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">< Back to
            Home</a>
    </div>

    <div class="my-2">
        <h2>Country: {{$country->title}}</h2>
    </div>

    @if(isset($medalType))
        <div class="my-2">
            <h2>Medal Type: {{$medalType}}</h2>
        </div>
    @endif

    <table class="table table-striped my-2">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Athlete</th>
            <th scope="col">Sport</th>
            @if(!isset($medalType))
                <th scope="col">Type</th>
            @endif
        </tr>
        </thead>
        <tbody>
        @foreach($medals as $key => $medal)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$medal->athlete->name}}</td>
                <td>{{$medal->sport->title}}</td>
                @if(!isset($medalType))
                    <td>{{$medal->type}}</td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
