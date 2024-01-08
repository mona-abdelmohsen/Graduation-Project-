<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Search extends Component
{
    public $searchTerm;
    public function render()
    {
        // return view('livewire.search');

    if ($this->searchTerm) {

        $searchTerm = $this->searchTerm . '%';
        $users = User::where('name', 'like', $searchTerm)->where('roles_name', 'صاحب السكن')->get();

        return view('livewire.search', compact('users'));
}
else
{
    return view('livewire.search');
}
}
}
