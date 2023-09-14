<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Contact;
use App\Mail\contactMail;


class contactMail extends Mailable
{
    use Queueable, SerializesModels;
    public $contact;
    /**
     * Create a new message instance.
     */
    public function __construct(Contact $contact)
    {
        //
        $this->contact = $contact;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Contact Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'e-commerce.mailContact',
        );
    }

    public function build()
    {
        return $this->view('e-commerce.mailContact')
            ->with([
                'name' => $this->contact->name,
                'email' => $this->contact->email,
                'subject' => $this->contact->subject,
                'message' => $this->contact->message
            ])
            ->subject('Gracias por ponerse en contacto con nosotros :)'); 
    }
    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
