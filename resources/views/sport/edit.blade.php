<table class="table table-striped ">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Sport</th>
        <th scope="col">Delete</th>
    </tr>
    </thead>
    <tbody>
    @foreach($sports as $key => $sport)
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$sport->title}}</td>
            <td><a class="btn btn-light" href="{{route('api.sports.delete', ['sportId' => $sport->id])}}">Delete</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
