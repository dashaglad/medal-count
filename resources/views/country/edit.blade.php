<table class="table table-striped ">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Country</th>
        <th scope="col">G</th>
        <th scope="col">S</th>
        <th scope="col">B</th>
        <th scope="col">Sum</th>
        <th scope="col">Delete</th>
    </tr>
    </thead>
    <tbody>
    @foreach($countries as $key => $country)
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$country->title}}</td>
            <td>{{count($country->goldMedals)}}</td>
            <td>{{count($country->silverMedals)}}</td>
            <td>{{count($country->bronzeMedals)}}</td>
            <td>{{count($country->goldMedals) + count($country->silverMedals) + count($country->bronzeMedals)}}</td>
            <td><a class="btn btn-light" href="{{route('api.countries.delete', ['countryId' => $country->id])}}">Delete</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
