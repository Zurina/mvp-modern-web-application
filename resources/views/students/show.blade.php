<x-app-layout>
    <div>
        <div style="display: flex; justify-content: space-around;">
            @if( Auth::id() == $student->id )
            <span class="subsection-header">Welcome to your own page!</span>
            <div>
                <span class="subsection-header">Add address</span>
                <x-create-address :countries="$countries" />
            </div>
            @endif
            <div style="display: flex; flex-direction: column;">
                <span class="subsection-header">{{$student->name}}, {{$student->email}}</span>
                <a class="link-button" href="{{ route('personalMap', ['id' => $student->id]) }}">Show personal map</a>
                @if( Auth::id() == $student->id )
                    <a class="link-button" href="{{ route('students.edit', ['student' => $student->id]) }}">Edit this user</a>
                @endif
            </div>
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
                    @if( Auth::id() == $student->id )
                    <td>
                        <a class="a-button" href="{{ route('addresses.edit', ['address' => $address]) }}">Edit this address</a>
                        <form method="POST" action="{{ route('addresses.destroy', ['address' => $address]) }}">
                            @csrf
                            @method('delete')
                            <x-input type="submit" value="Delete this address" onclick="return confirm('Are you sure you want to delete this address?')" />
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