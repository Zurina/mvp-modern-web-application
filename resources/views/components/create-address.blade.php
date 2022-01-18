<form method="POST" action="{{ route('addresses.store') }}">
    @csrf
    <x-dropdown-countries :countries=$countries />
    <div class="mt-4">
        <x-input id="current_address" class="mt-1" type="checkbox" name="current_address" /> Current Address
    </div>

    <x-button>Add Address</x-button>
</form>