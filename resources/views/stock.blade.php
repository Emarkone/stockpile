<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Stock') }}
    </h2>
  </x-slot>


  <div class="py-10">
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <livewire:datatable class="overflow-hidden" model="App\Models\Product" exclude="created_at, updated_at" searchable="name"/>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>

@livewireScripts