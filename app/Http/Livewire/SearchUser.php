<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class SearchUser extends Component
{

    use WithPagination;

    public $search = '';

    public function updatingSearch() 
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.search-user', [
            'users' => Product::where('name','LIKE', '%'.$this->search.'%')->paginate(20),
        ]);
    }
}
