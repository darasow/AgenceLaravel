<?php

namespace App\Mail;

use App\Models\Propriete;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ProprieteContactMail extends Mailable
{
    use Queueable, SerializesModels;
     // Queueable // pour les fills d'attente
     // SerializesModels // pour serialiser les methode

    /**
     * Create a new message instance.
     */
    public function __construct(public Propriete $propriete, public array $data)
    {
        
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Propriete Contact Mail',
            to: 'dara1998@gmail.com',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.propriete.Contact',
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
