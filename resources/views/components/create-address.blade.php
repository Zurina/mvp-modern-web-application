<form method="POST" action="{{ route('addresses.store') }}">
    @csrf
    <x-dropdown-countries :countries=$countries />
    <input checked="checked" name="current_address" id="current_address" type="checkbox" value=yes> Current Address
    <x-button>Add Address</x-button>
</form>