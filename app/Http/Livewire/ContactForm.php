<?php

namespace App\Http\Livewire;

use Request;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class ContactForm extends Component
{

    public $page = 'start';

    public $fromPlayer;
    public $username;
    public $discord_username;
    public $email;
    public $subject;
    public $message;

    protected $messages = [
        'username.required' => 'Le pseudo Minecraft est requis.',
        'username.min' => 'Le pseudo Minecraft est trop court.',
        'discord_username.regex' => 'Le pseudo Discord doit respecter la forme user#0000.',
        'email.required' => 'L\'adresse email est requise.',
        'email.email' => 'L\'adresse email n\'est pas valide.',
        'subject.required' => 'Le sujet est requis.',
        'subject.min' => 'Le sujet est trop court.',
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
            'subject' => 'required|min:4',
            'message' => 'required|min:30|max:1500',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        // Validate the form
        $this->validate();

        // Construct the message
        $fields = array();
        if ($this->fromPlayer) {
            array_push(
                $fields,
                [
                    "name" => "`Pseudo Minecraft`",
                    "value" => $this->username,
                    "inline" => true
                ]
            );
            if ($this->discord_username) {
                array_push(
                    $fields,
                    [
                        "name" => "`Pseudo Discord`",
                        "value" => $this->discord_username,
                        "inline" => true
                    ]
                );
            }
        } else {
            array_push(
                $fields,
                [
                    "name" => "`Email`",
                    "value" => $this->email,
                    "inline" => true
                ]
            );
        }
        array_push(
            $fields,
            [
                "name" => "`Adresse IP`",
                "value" => $ip = Request::getClientIp(),
                "inline" => true
            ],
            [
                "name" => "`Type de requête`",
                "value" => $this->fromPlayer ? "Joueur" : "Autre",
                "inline" => true
            ]
        );

        usleep(500000);

        // Send the message to discord webhook
        $response = Http::post(env('DISCORD_CONTACT_WEBHOOK_URL'), [
            'embeds' => [
                [
                    "title" => $this->subject,
                    "description" => $this->message,
                    "color" => $this->fromPlayer ? 12734287 : 5215938,
                    "fields" => $fields,
                    "author" => [
                        "name" => "Nouveau message de redcraft.org/contact",
                        "icon_url" => "https://i.imgur.com/nR8LjCP.png"
                    ]
                ]
            ],
        ]);

        if ($response->successful()) {
            $this->page = 'success';
        } else {
            $this->page = 'error';
            dd($response->body());
            return [
                'error' => $response->body()
            ];
        }

        $this->page = 'error';




        $this->reset();
        $this->page = 'success';
    }
}
