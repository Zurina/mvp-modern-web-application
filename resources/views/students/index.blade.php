<!DOCTYPE html>
<html>

<head>
    <title>Book App</title>
    <link rel="stylesheet" href="{{ URL::asset('main.css') }}">
</head>

<body>
    <div>
        <h1>All the students</h1>
        <x-students-table :students=$students/>
    </div>
</body>
</html>