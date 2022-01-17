<x-app-layout>
    <div>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>
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
    </div>
</x-app-layout>