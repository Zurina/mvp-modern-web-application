<x-app-layout>
  <div>
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
      </h2>
    </x-slot>
    <div>
        <h1>All the students</h1>
        <x-students-table :students=$students/>
    </div>
  </div>
</x-app-layout>