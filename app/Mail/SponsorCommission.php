<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SponsorCommission extends Mailable
{
    use Queueable, SerializesModels;


    public $customer;
    public $recipient;
    public $subscriptionOrder;


    /**
     * Create a new message instance.
     */
    public function __construct($recipient, $customer,$subscriptionOrder)
    {
        $this->customer = $customer;
        $this->recipient = $recipient;
        $this->subscriptionOrder = $subscriptionOrder;
    }   

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Sponsor Commission',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.transactions.sponsor-commission',
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
