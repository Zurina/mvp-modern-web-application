<form method="POST" action="{{ route('addresses.update', ['address' => $address]) }}">
    @csrf
    @method('put')
    <span>Address Id: {{$address->id}}</span>
    <x-dropdown-countries :countries=$countries />

    <div class="mt-4">
        <x-input id="current_address" class="mt-1" type="checkbox" name="current_address" /> Current Address
    </div>

    <x-button>Update Address</x-button>
</form>