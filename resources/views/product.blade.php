<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Products') }}
    </h2>
  </x-slot>

  <div class="py-10">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

        <div class="p-10">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">Add new product</h2>
          <form name="add-blog-post-form" id="add-blog-post-form" method="POST" action="{{url('product-add')}}">
            @csrf
            <div class="mt-4">
              <x-jet-label for="name" value="{{ __('Name') }}" />
              <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus />
            </div>
            <div class="mt-4">
              <x-jet-label for="detail" value="{{ __('Detail') }}" />
              <textarea id="detail" class="block mt-1 w-full" name="detail" :value="old('detail')" autofocus /></textarea>
            </div>
            <label class="mt-4 block" for="active" class="flex items-center">
              <x-jet-checkbox id="active" name="active" />
              <span class="ml-2 text-sm text-gray-600">{{ __('Active') }}</span>
            </label>

            <x-jet-button class="mt-4">Submit</x-jet-button>
          </form>
        </div>

        <div class="p-10">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">Products</h2>
          <livewire:datatable class="overflow-hidden" model="App\Models\Product" exclude="created_at, updated_at" searchable="name" />
        </div>
      </div>
    </div>
  </div>
</x-app-layout>