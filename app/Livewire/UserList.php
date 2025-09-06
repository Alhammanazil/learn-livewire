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
        return User::query()
            ->when($this->search, function ($q) {
                $term = '%' . $this->search . '%';
                $q->where(function ($qq) use ($term) {
                    $qq->where('name', 'like', $term)
                        ->orWhere('email', 'like', $term);
                });
            })
            ->latest()
            ->paginate(6);
    }
}
