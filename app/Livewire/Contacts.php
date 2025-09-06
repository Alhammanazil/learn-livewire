<?php

namespace App\Livewire;

use App\Livewire\Forms\ContactForm;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Contact Us')]
class Contacts extends Component
{
    public ContactForm $form;

    public function createNewMessage()
    {
        $this->form->store();

        session()->flash('success', 'Your message has been sent successfully!');
    }

    public function render()
    {
        return view('livewire.contacts');
    }
}
