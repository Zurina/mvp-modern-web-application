<!DOCTYPE html>
<html>

<head>
    <title>Book App</title>
    <link rel="stylesheet" href="{{ URL::asset('main.css') }}">
</head>

<body>
    <div>

        <h1>All the students</h1>
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
    </div>
</body>
</html>