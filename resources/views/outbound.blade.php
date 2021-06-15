<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Inbound') }}
    </h2>
  </x-slot>


  <div class="py-10">

    <x-jet-validation-errors class="mb-4"/>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

        <div class="p-10">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">Add new outbound</h2>
          <form name="add-blog-post-form" id="add-blog-post-form" method="POST" action="{{url('inbound-add')}}">
            @csrf
            <div class="mt-4">
              <x-jet-label for="product_id" value="{{ __('Product ID') }}" />
              <x-jet-input id="product_id" class="block mt-1 w-full" type="text" name="product_id" :value="old('product_id')" autofocus />
            </div>

            <div class="mt-4">
              <x-jet-label for="user_id" value="{{ __('User ID') }}" />
              <x-jet-input id="user_id" class="block mt-1 w-full" type="text" name="user_id" :value="old('user_id')" autofocus />
            </div>

            <div class="mt-4">
              <x-jet-label for="quantity" value="{{ __('Quantity') }}" />
              <x-jet-input id="quantity" class="block mt-1 w-full" type="number" name="quantity" :value="old('quantity')" autofocus />
            </div>
            <div class="mt-4">
              <x-jet-label for="sell_price" value="{{ __('Sell Price') }}" />
              <x-jet-input id="sell_price" class="block mt-1 w-full" type="number" step="0.01" name="sell_price" :value="old('sell_price')" autofocus />
            </div>

            <x-jet-button class="mt-4">Submit</x-jet-button>
          </form>
        </div>

        <div class="p-10">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">Products outbound</h2>
          <livewire:datatable class="overflow-hidden" model="App\Models\Outbound" exclude="created_at, updated_at" searchable="name"/>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>

@livewireScripts