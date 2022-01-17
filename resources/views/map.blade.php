<x-app-layout>
  <div>
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
      </h2>
    </x-slot>
    <x-map-layout mapConfig={!!$mapConfig!!} />

    @if($countryName != null && $students != null)
    <h1>{{$countryName}}</h1>
    <x-students-table :students=$students />
    @endif
  </div>
</x-app-layout>