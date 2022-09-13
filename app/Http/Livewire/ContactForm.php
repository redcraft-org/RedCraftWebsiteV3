<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class ContactForm extends Component
{

    public $page = 'start';

    public $fromPlayer;
    public $username;
    public $discord_username;
    public $email;
    public $message;

    protected $messages = [
        'username.required' => 'Le pseudo Minecraft est requis.',
        'username.min' => 'Le pseudo Minecraft est trop court.',
        'discord_username.regex' => 'Le pseudo Discord doit respecter la forme user#0000.',
        'email.required' => 'L\'adresse email est requise.',
        'email.email' => 'L\'adresse email n\'est pas valide.',
        'message.required' => 'Le message est requis.',
        'message.min' => 'Le message est trop court.',
        'message.max' => 'Le message est trop long.',
    ];

    protected function rules()
    {
        return [
            'username' => !$this->fromPlayer ? '' : 'required|min:4',
            'email' => $this->fromPlayer ? '' : 'required|email',
            'discord_username' => 'nullable|regex:/^.{3,32}#[0-9]{4}$/',
            'message' => 'required|min:30|max:1500',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();

        // Send message to discord webhook
        // Http::post(env('DISCORD_CONTACT_WEBHOOK_URL'), [
        //     'embeds' => [
        //         [
        //             'title' => "An awesome new notification!",
        //             'description' => "Discord Webhooks are great!",
        //             'color' => '7506394',
        //         ]
        //     ],
        // ]);

        usleep(500000);
        $this->reset();
        $this->page = 'success';
    }
}
