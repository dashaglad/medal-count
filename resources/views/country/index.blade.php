<table class="table table-striped ">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Country</th>
        <th scope="col">G</th>
        <th scope="col">S</th>
        <th scope="col">B</th>
        <th scope="col">Sum</th>
    </tr>
    </thead>
    <tbody>
    @foreach($countries as $key => $country)
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$country->title}}</td>
            <td>
                <a href="{{route('countries.medals', [$country->id, 'gold'])}}" class="link-dark">
                    {{count($country->goldMedals)}}
                </a>
            </td>
            <td>
                <a href="{{route('countries.medals', [$country->id, 'silver'])}}" class="link-dark">
                    {{count($country->silverMedals)}}
                </a>
            </td>
            <td>
                <a href="{{route('countries.medals', [$country->id, 'bronze'])}}" class="link-dark">
                    {{count($country->bronzeMedals)}}
                </a>
            </td>
            <td>
                <a href="{{route('countries.medals.all', $country->id)}}" class="link-dark">
                    {{count($country->goldMedals) + count($country->silverMedals) + count($country->bronzeMedals)}}
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
