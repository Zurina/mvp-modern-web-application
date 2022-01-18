<x-app-layout>
    <div style="text-align: center;">
        <h1>Welcome to your own page! You can configure your details here..</h1>
        <x-create-address :countries="$countries" />
        <h3>{{$student->name}}, {{$student->email}}</h3>
    </div>
</x-app-layout>