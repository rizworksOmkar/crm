<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class pacakageConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {              

        $mailSend = $this->view('emails.packageconfirmation-email')
                    ->from($this->data['from'],'TravlhostOnline Support')
                    ->replyTo($this->data['from'])
                    ->subject($this->data['subject'])
                    ->to($this->data['to'])
                    ->with($this->data);

        return $mailSend;
    }
}
