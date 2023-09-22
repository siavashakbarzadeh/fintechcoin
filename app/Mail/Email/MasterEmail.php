<?php

namespace App\Mail\Email;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MasterEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        $replies = [];
        if ($this->email->reply_to_email) $replies[] = new Address($this->email->reply_to_email, substr($this->email->reply_to_email, 0, strrpos($this->email->reply_to_email, '@')));
        return new Envelope(
            from: $this->email->from_name ? new Address(config('mail.from.address'), $this->email->from_name) : new Address(config('mail.from.address'), config('mail.from.name')),
            replyTo: $replies,
            subject: $this->email->subject ?? config('app.name'),
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'email.mails.master-email',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
