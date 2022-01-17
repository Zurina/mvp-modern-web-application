<x-app-layout>
    <div>
        <div>
            @if( Auth::id() == $student->id )
            <h1>Welcome to your own page! You can configure your details here..</h2>
                <x-create-address :countries="$countries" />
                @endif
                <h3>{{$student->name}}, {{$student->email}}
            </h1>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Short label</th>
                    <th>Country</th>
                    <th>Current Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($student->addresses as $address)
                <tr>
                    <td>{{ $address['id'] }}</td>
                    <td>{{ $address->country->shortLabel }}</td>
                    <td>{{ $address->country->label }}</td>
                    <td>{{ $address['current_address'] == 1 ? 'True' : 'False' }}</td>
                    <td>
                        {{ Form::open(array('url' => 'addresses/' . $address['id'])) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                            <input type="submit" value="Delete this address" onclick="return confirm('Are you sure you want to delete this address?')">
                        {{ Form::close() }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
</x-app-layout>