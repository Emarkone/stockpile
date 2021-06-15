<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Inbound') }}
    </h2>
  </x-slot>

  <div class="py-10">
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

        <div class="p-10">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight" >Add new product</h2>
          <form name="add-blog-post-form" id="add-blog-post-form" method="POST" action="{{url('stock-add')}}">
            @csrf
            <div class="mt-4">
              <x-jet-label for="name" value="{{ __('Name') }}" />
              <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus />
            </div>
            <div class="mt-4">
              <x-jet-label for="detail" value="{{ __('Detail') }}" />
              <textarea id="detail" class="block mt-1 w-full" name="detail" :value="old('detail')" autofocus /></textarea>
            </div>
            <div class="mt-4">
              <x-jet-label for="quantity" value="{{ __('Quantity') }}" />
              <x-jet-input id="quantity" class="block mt-1 w-full" type="number" name="quantity" :value="old('quantity')" autofocus />
            </div>
            <div class="mt-4">
              <x-jet-label for="buy_price" value="{{ __('Buy Price') }}" />
              <x-jet-input id="buy_price" class="block mt-1 w-full" type="number" step="0.01" name="buy_price" :value="old('buy_price')" autofocus />
            </div>
            <div class="mt-4">
              <x-jet-label for="expiration_date" value="{{ __('Expiration Date') }}" />
              <x-jet-input id="expiration_date" class="block mt-1 w-full" type="date" name="expiration_date" :value="old('expiration_date')" autofocus />
            </div>
            <label class="mt-4 block" for="active" class="flex items-center">
              <x-jet-checkbox id="active" name="active" />
              <span class="ml-2 text-sm text-gray-600">{{ __('Active') }}</span>
            </label>

            <x-jet-button class="mt-4">Submit</x-jet-button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>