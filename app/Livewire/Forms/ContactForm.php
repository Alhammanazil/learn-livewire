<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Contact;
use Livewire\Attributes\Validate;

class ContactForm extends Form
{
    #[Validate('required|email:dns')]

    public $email = '';

    #[Validate('required|min:3')]
    public $subject = '';

    #[Validate('required|min:10')]
    public $message = '';

    public function store()
    {
        $this->validate();

        Contact::create($this->all());

        $this->reset();
    }
}
