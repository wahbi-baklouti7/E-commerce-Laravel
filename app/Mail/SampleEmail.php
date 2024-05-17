<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SampleEmail extends Mailable
{
    use Queueable, SerializesModels;


    // public $name;
    // public $message;

    /**
     * Create a new message instance.
     */
    // public function __construct($name,$message)
    // {
    //     //
    //     $this->name= $name;
    //     $this->message= $message;

    // }

    public $order;
    public $orderProducts;
    public function __construct($order,$data)
    {
        //

        $this->order= $order;
        $this->orderProducts= $data;


    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Order Placed',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.sample',
            with: [
                'orders' => $this->order,
                'orderProducts' => $this->orderProducts
                // 'name' => $this->name,
                // 'message' => $this->message
            ]
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
