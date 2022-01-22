<table>
    <thead>
        <tr>
            <th>Profile Image</th>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>More details</th>
            @if( auth()->check() && auth()->user()->is_admin )
            <th>
                Action
            </th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
        <tr>
            <td><img src="{{$student->getFirstMediaUrl('avatar', 'thumb')}}" / width="120px"></td>
            <td>{{ $student['id'] }}</td>
            <td>{{ $student['name'] }}</td>
            <td>{{ $student['email'] }}</td>
            <td><a class="a-button" href="{{ URL::to('students/' . $student['id']) }}">More details</a></td>
            <td>
                <form method="POST" action="{{ route('students.destroy', ['student' => $student]) }}">
                    @csrf
                    @method('delete')
                    <x-input type="submit" value="Delete this user" onclick="return confirm('Are you sure you want to delete this user?')" />
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>