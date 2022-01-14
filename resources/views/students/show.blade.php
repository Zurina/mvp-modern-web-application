<!DOCTYPE html>
<html>

<head>
    <title>Book App</title>
    <link rel="stylesheet" href="{{ URL::asset('main.css') }}">
</head>

<body>
    <div>
        <h1>{{$student->name}}</h1>
        <strong>{{$student->email}}</strong>
    </div>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Country Id</th>
                    <th>Current Address</th>
                </tr>
            </thead>
            <tbody>
            @foreach($student->addresses as $address)
                <tr>
                    <td>{{ $address['id'] }}</td>
                    <td>{{ $address['country_id'] }}</td>
                    <td>{{ $address['current_address'] == 1 ? 'True' : 'False' }}</td>
                    
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>