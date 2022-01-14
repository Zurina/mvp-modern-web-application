<html>
    <head>
        <title>FusionCharts | My First Map</title>
        
        <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
        <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.maps.js"></script>
        <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/maps/fusioncharts.worldwithcountries.js"></script>
        <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
        <link rel="stylesheet" href="{{ URL::asset('main.css') }}">
    </head>
    <body>
      <x-map-layout mapConfig={!!$mapConfig!!}/>

      <h1>{{$countryName}}</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <td>{{ $student['id'] }}</td>
                    <td>{{ $student['name'] }}</td>
                    <td>{{ $student['email'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>

