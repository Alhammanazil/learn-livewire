<?php
namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Users extends Component
{
    public $showTable = true;
    public $showForm  = false;

    public $name = '';
    public $email = '';
    public $password = '';

    protected $rules = [
        'name'     => 'required|string|min:3',
        'email'    => 'required|email|unique:users,email',
        'password' => 'required|string|min:6',
    ];

    // Toggle tabel
    public function showUsers()
    {
        $this->showTable = true;
    }
    public function hideUsers()
    {
        $this->showTable = false;
    }

    // Toggle form (nama method beda dari nama property!)
    public function showFormPanel()
    {
        $this->resetForm();
        $this->showForm = true;
    }

    public function hideFormPanel()
    {
        $this->showForm = false;
    }

    // Submit create user
    public function storeUser()
    {
        $data = $this->validate();

        User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // Setelah simpan: reset field, tetap tampilkan form agar bisa input lagi,
        // tampilkan tabel agar terlihat user baru.
        $this->resetForm();
        $this->showForm  = true;
        $this->showTable = true;

        session()->flash('success', 'User berhasil dibuat.');
    }

    private function resetForm()
    {
        $this->reset();
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.users', [
            'users' => User::latest()->get(),
        ]);
    }
}
