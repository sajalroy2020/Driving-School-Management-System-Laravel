<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CommonEmailHandler extends Mailable
{
    use Queueable, SerializesModels;

    protected $mailSubject;
    protected $mailContent;

    /**
     * Create a new message instance.
     */
    public function __construct($mailSubject, $mailContent)
    {
        $this->mailSubject = $mailSubject;
        $this->mailContent = $mailContent;
    }

    public function build()
    {
        return $this->from(getSetting('MAIL_FROM_ADDRESS'), getSetting('app_name'))
            ->subject($this->mailSubject)
            ->markdown('mail.common_email_handler')
            ->with([
                'subject' => $this->mailSubject,
                'content' => $this->mailContent,
            ]);
    }
}
