<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;

class UserList extends Component
{
    use WithPagination;

    public $search = '';
    public $avatar;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    #[On('user-created')]
    public function handleUserCreated()
    {
        $this->resetPage();
    }

    public function placeholder()
    {
        return view("livewire.placeholder.skeleton");
    }

    #[Computed()]
    public function users()
    {
        return User::latest()
            ->where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->paginate(6);
    }
}
