<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;

    /**
     * Create a new message instance.
     */
    public function __construct(User $data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->view('emails.sendemail')
            ->subject('Register Success')
            ->with([
                'name' => $this->data['name'],
                'email' => $this->data['email'],
            ]);
    }
}
