<table class="table table-striped ">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Athlete</th>
        <th scope="col">Country</th>
        <th scope="col">Delete</th>
    </tr>
    </thead>
    <tbody>
    @foreach($athletes as $key => $athlete)
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$athlete->name}}</td>
            <td>{{$athlete->country->title}}</td>
            <td><a class="btn btn-light" href="{{route('api.athletes.delete', ['athleteId' => $athlete->id])}}">Delete</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
