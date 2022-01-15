<html>

<head>
  <title>The International Map</title>

  <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
  <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.maps.js"></script>
  <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/maps/fusioncharts.worldwithcountries.js"></script>
  <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
  <link rel="stylesheet" href="{{ URL::asset('main.css') }}">
</head>

<body>
  <x-map-layout mapConfig={!!$mapConfig!!} />

  @if($countryName != null && $students != null)         
    <h1>{{$countryName}}</h1>
    <x-students-table :students=$students />
  @endif
</body>

</html>