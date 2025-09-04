<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Hash;

class Users extends Component
{
    use WithFileUploads;
    use WithPagination;

    public int $perPage = 7;

    public $search = '';

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    #[Validate('required|string|min:3')]
    public $name = '';

    #[Validate('required|email|unique:users,email')]
    public $email = '';

    #[Validate('required|string|min:6')]
    public $password = '';

    #[Validate('nullable|image|max:5120')]
    public $avatar;

    // Reset pagination on search change
    public function updatingSearch()
    {
        $this->resetPage();
    }

    // Optional explicit submit from the search form
    public function submitSearch() {}

    // Submit create user
    public function storeUser()
    {
        $data = $this->validate();

        $avatarPath = null;
        if ($this->avatar) {
            $avatarPath = $this->avatar->store('avatars', 'public');
        }

        User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
            'avatar'   => $avatarPath,
        ]);

        // Setelah simpan: reset field, tetap tampilkan form agar bisa input lagi
        $this->resetForm();

        // Kembali ke halaman pertama agar user baru terlihat di atas
        $this->resetPage();

        session()->flash('success', 'User berhasil dibuat.');
    }

    private function resetForm()
    {
        // Reset only form fields, keep UI visibility flags
        $this->reset(['name', 'email', 'password', 'avatar']);
        $this->resetValidation();
    }

    // Realtime validation on individual property updates
    public function updated($property)
    {
        if (in_array($property, ['name', 'email', 'password', 'avatar'])) {
            $this->validateOnly($property);
        }
    }

    public function render()
    {
        $users = User::query()
            ->when($this->search, function ($q) {
                $term = '%' . $this->search . '%';
                $q->where(function ($qq) use ($term) {
                    $qq->where('name', 'like', $term)
                        ->orWhere('email', 'like', $term);
                });
            })
            ->latest()
            ->paginate($this->perPage);

        return view('livewire.users', compact('users'));
    }
}
