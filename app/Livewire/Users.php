<?php

namespace App\Livewire;

use Livewire\Component;

// Komponen Users sudah dipisah menjadi UserList dan UserRegisterForm
// File ini bisa dihapus jika tidak digunakan lagi

class Users extends Component
{
    public function render()
    {
        return view('livewire.users');
    }
}
