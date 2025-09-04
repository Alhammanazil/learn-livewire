<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRegisterForm extends Component
{
    use WithFileUploads;
    public $name = '';

    public $email = '';

    public $password = '';

    public $avatar;

    public function storeUser()
    {
        $data = $this->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'avatar' => 'nullable|image|max:5120',
        ]);

        $avatarPath = null;
        if ($this->avatar) {
            $avatarPath = $this->avatar->store('avatars', 'public');
        }

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'avatar' => $avatarPath,
        ]);

        $this->reset(['name', 'email', 'password', 'avatar']);
        $this->resetValidation();

        session()->flash('success', 'User berhasil dibuat.');
        // dispatch cross-component event so list can refresh
        $this->dispatch('user-created');
    }

    public function updated($property)
    {
        $this->validateOnly($property, [
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'avatar' => 'nullable|image|max:5120',
        ]);
    }

    public function render()
    {
        return view('livewire.user-register-form');
    }
}
