<x-app-layout>
    <div>
        <div style="text-align: center;">
            @if( Auth::id() == $student->id )
            <h1>Welcome to your own page! You can configure your details here..</h1>
                <x-create-address :countries="$countries" />
            @endif
            <h3>{{$student->name}}, {{$student->email}}</h3>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Short label</th>
                    <th>Country</th>
                    <th>Current Address</th>
                    @if( Auth::id() == $student->id )
                        <th>Actions</th>
                    @endif
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
                    @if( Auth::id() == $student->id )
                        <a class="a-button" href="{{ route('addresses.edit', ['address' => $address]) }}">Edit this address</a>
                        <form method="POST" action="{{ route('addresses.destroy', ['address' => $address]) }}">
                            @csrf
                            @method('delete')
                            <x-input type="submit" value="Delete this address" onclick="return confirm('Are you sure you want to delete this address?')"/>
                        </form>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
</x-app-layout>