<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ContactForm extends Component
{

    public $requestType = 'player';
    public $username;
    public $discord_username;
    public $email;
    public $message;

    protected function rules()
    {
        return [
            'username' => 'required|min:4',
            'discord_username' => 'required|regex:/^.{3,32}#[0-9]{4}$/',
            'email' => 'required|email',
            'message' => 'required|min:30',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();
        dd('submit');

        // Send message

    }
}
