<x-app-layout>
    <div>
        <div>
            @if( Auth::id() == $student->id )
                <h1>Welcome to your own page! You can configure your details here..</h2> 
            @endif
            <h3>{{$student->name}}, {{$student->email}}</h1>
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
    </div>
</x-app-layout>