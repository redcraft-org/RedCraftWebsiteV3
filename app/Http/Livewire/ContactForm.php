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

    protected function messages()
    {
        return  [
            'username.required' =>      __('contact.form.messages.username_required'),
            'username.min' =>           __('contact.form.messages.username_min'),
            'discord_username.regex' => __('contact.form.messages.discord_username_regex'),
            'email.required' =>         __('contact.form.messages.email_required'),
            'email.email' =>            __('contact.form.messages.email_email'),
            'subject.required' =>       __('contact.form.messages.subject_required'),
            'subject.min' =>            __('contact.form.messages.subject_min'),
            'message.required' =>       __('contact.form.messages.message_required'),
            'message.min' =>            __('contact.form.messages.message_min'),
            'message.max' =>            __('contact.form.messages.message_max'),
        ];
    }

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
        $this->validate(
            $this->rules(),
            $this->messages(),
        );

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
