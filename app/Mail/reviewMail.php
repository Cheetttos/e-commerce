<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Review;

class reviewMail extends Mailable
{
    use Queueable, SerializesModels;
    public $review;
    /**
     * Create a new message instance.
     */
    public function __construct(Review $review)
    {
        //
        $this->review = $review;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Review Mail',
        );
    }

    public function build()
    {
        return $this->view('e-commerce.mailReview')
            ->with([
                'name' => $this->review->name,
                'product_id' => $this->review->product_id,
                // Otros datos necesarios
            ])
            ->subject('Gracias por tu review :)'); // Puedes cambiar el asunto del correo aquí
    }
    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'e-commerce.mailReview',
        );
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
