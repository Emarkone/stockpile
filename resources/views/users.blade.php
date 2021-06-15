<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Inbound') }}
    </h2>
  </x-slot>


  <div class="py-10">

    <x-jet-validation-errors class="mb-4" />

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

        <div class="p-10">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">Add new user</h2>
          <form class="mt-4" name="add-blog-post-form" id="add-blog-post-form" method="POST" action="{{url('user-add')}}">
            @csrf

            <div class="mt-4">
              <x-jet-label for="name" value="{{ __('Name') }}" />
              <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus />
            </div>

            <div class="mt-4">
              <x-jet-label for="email" value="{{ __('Mail') }}" />
              <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" autofocus />
            </div>

            <div class="mt-4">
              <x-jet-label for="phone_number" value="{{ __('Phone number') }}" />
              <x-jet-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="old('phone_number')" autofocus />
            </div>

            <div class="mt-4">
              <x-jet-label for="mailing_address" value="{{ __('Mailing Address') }}" />
              <x-jet-input id="mailing_address" class="block mt-1 w-full" type="text" step="0.01" name="mailing_address" :value="old('mailing_address')" autofocus />
            </div>

            <div class="mt-4">
              <x-jet-label for="password" value="{{ __('Password') }}" />
              <x-jet-input id="password" class="block mt-1 w-full" type="password" step="0.01" name="password" :value="old('password')" autofocus />
            </div>

            <div class="mt-4">
              <x-jet-label for="user_type" value="{{ __('User Type') }}" />
              <select class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="user_type" id="user_type">
                <option value="client">Client</option>
                <option value="client">Supplier</option>
                <option value="client">Admin</option>
              </select>
            </div>

            <x-jet-button class="mt-4">Submit</x-jet-button>
          </form>
        </div>

        <div class="p-10">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">Users</h2>
          <div clas="mt-4">
            <livewire:datatable class="overflow-hidden" model="App\Models\User" exclude="created_at, updated_at, profile_photo_path" searchable="name" />
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>

@livewireScripts