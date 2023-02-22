<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mailData)
    {
        //
        $this->mailData = $mailData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->mailData['action'] == 'sendRequestMessage')
            return $this->view('frontend.emails.contact_email')
                        ->subject($this->mailData['action'])
                        ->from('myadmin@systesting.engmalik.com', 'AmymGroup')
                        ->with('mailData', $this->mailData);
        else 
            return $this->view('contact_email',)
                        ->subject('A New Appointment Requested')
                        ->from('myadmin@systesting.engmalik.com', 'Miraf Web System')
                        ->with('mailData', $this->mailData);
    }
}
