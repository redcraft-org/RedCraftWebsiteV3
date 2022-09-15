<?php

namespace App\Http\Livewire;

use Request;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class ContactForm extends Component
{

    public $page = 'start';

    public $fromPlayer;
    public $username = 'Codelta';
    public $discord_username = 'Codelta#0001';
    public $email;
    public $subject = 'I have a question';
    public $message = 'Hello, I have a question about your server.';

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

    // Real time validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        // Validate the form
        $this->validate();

        // Wait 250ms for a better UX
        usleep(250000);

        // Send the message to discord webhook
        $response = Http::post(env('DISCORD_CONTACT_WEBHOOK_URL'), [
            'thread_name' => ($this->fromPlayer ? '🎮' : '👤') . ' ' . $this->subject,
            'username' => $this->fromPlayer ? $this->username : $this->email,
            // TODO Use the Skin API
            'avatar_url' => $this->fromPlayer ?
                'https://crafatar.com/avatars/' . $this->username . '?size=128' :
                'https://www.gravatar.com/avatar/' . md5($this->email) . '?s=128',
            'content' => $this->build_message_content(),
            'applied_tags' => $this->fromPlayer ? 'Player' : 'Other',
        ]);

        // Error handling
        if ($response->successful()) {

            $this->page = 'success';
            $this->resetExcept('page');
        } else {

            $this->page = 'error';
            session()->flash('contactFormErrorCode', json_decode($response->body())->code);
            session()->flash('contactFormErrorMessage', json_decode($response->body())->message);
        }
    }

    private function build_message_content()
    {
        $content = '🗒️ `Type de requête` : ' . ($this->fromPlayer ? 'Joueur' : 'Autre') . "\n\n";
        $content .= ($this->fromPlayer ? '🧩 `Pseudo Minecraft` : ' . $this->username . "\n\n" : '');
        $content .= ($this->discord_username ? '🗨️ `Pseudo Discord` : ' . $this->discord_username . "\n\n" : '');
        $content .= (!$this->fromPlayer ? '📧 `Email` : ' . $this->email . "\n\n" : '');
        $content .= '- `🏠 IP` : ' . Request::ip() . "\n\n";
        $content .= '- `🦊 User Agent` : ' . Request::header('User-Agent');
        $content .= "\n\nMessage :\n";
        $content .= "```" . $this->message . "```";

        return $content;
    }
}
