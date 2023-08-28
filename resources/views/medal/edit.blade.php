<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Athlete</th>
        <th scope="col">Sport</th>

        <th scope="col">Country</th>
        <th scope="col">Type</th>
        <th scope="col">Delete</th>
    </tr>
    </thead>
    <tbody>
    @foreach($medals as $key => $medal)
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$medal->athlete->name}}</td>
            <td>{{$medal->sport->title}}</td>

            <td>{{$medal->country->title}}</td>
            <td>{{$medal->type}}</td>

            <td>
                <a class="btn btn-light" href="{{route('api.medals.delete', ['medalId' => $medal->id])}}">
                    Delete
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
