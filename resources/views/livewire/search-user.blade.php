<div>
    <form>
        <x-jet-label for="searchUser" value="{{ __('Search user') }}" />
        <x-jet-input wire:model="search" id="searchUser" class="block mt-1 w-full" type="text" name="searchUser" />
    </form>
    <ul>
        @foreach($users as $user)
        <li>{{ $user->name }}</li>
        @endforeach

        {{ $users->links() }}
    </ul>
</div>