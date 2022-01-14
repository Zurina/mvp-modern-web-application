<!DOCTYPE html>
<html>
<head>
    <title>Book App</title>
    <link rel="stylesheet" href="{{ URL::asset('main.css') }}">
</head>
<body>
<div>

<h1>All the students</h1>
{{ Html::ul($errors->all()) }}

@if (Session::has('message'))
    <div>{{ Session::get('message') }}</div>
@endif

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th class="highlight-sorting-column">Name <a href="/books?column=name&sorted=desc">&uarr;</a></th>
            <th class="highlight-sorting-column">Author <a href="/books?column=author&sorted=asc">&darr;</a></th>        
            <th class="highlight-sorting-column">Pages <a href="/books?column=pages&sorted=desc">&uarr;</a></th>
        </tr>
    </thead>
    <tbody>
    @foreach($students as $student)
        <tr>
            <td>{{ $book['id'] }}</td>
            <td>{{ $book['name'] }}</td>
            <td>{{ $book['author'] }}</td>
            <td>{{ $book['pages'] }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<div class="pagination">
    @if($prevPage == '') 
        <a class="disabled">Previous</a>
    @else
        <a href={{$prevPage}}&column={{$column}}&sorted={{$sorted}}&perPage={{$perPage}}">Previous</a>
        <a href={{$firstPageUrl}}&column={{$column}}&sorted={{$sorted}}&perPage={{$perPage}}">1</a>
    @endif
    <a class="disabled active">{{$currentPage}}</a>
    @if($nextPage == '') 
        <a class="disabled">Next</a>
    @else
        <a href="{{$lastPageUrl}}&column={{$column}}&sorted={{$sorted}}&perPage={{$perPage}}">{{$lastPage}}</a>
        <a href="{{$nextPage}}&column={{$column}}&sorted={{$sorted}}&perPage={{$perPage}}">Next</a>
    @endif
</div>

</div>
</body>
</html>