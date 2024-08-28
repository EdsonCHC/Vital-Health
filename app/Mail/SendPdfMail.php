<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendPdfMail extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $pdfContent;
    public $pdfFilename;
    /**
     * Create a new message instance.
     */
    public function __construct($user, $pdfContent, $pdfFilename)
    {
        $this->user = $user;
        $this->pdfContent = $pdfContent;
        $this->pdfFilename = $pdfFilename;
    }

    /**
     * Build the message.
     *99
     * @return $this
     */
    public function build()
    {
        return $this->view('pdf.send_pdf')
            ->subject('Aquí está tu PDF')
            ->attachData($this->pdfContent, $this->pdfFilename, [
                'mime' => 'application/pdf',
            ]);
    }

}
