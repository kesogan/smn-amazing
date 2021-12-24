<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ComfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $content;
    public $pdf;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($content,$pdf)
    {
        $this->content = $content;
        $this->pdf=$pdf;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.comfirmail') //here is your mail content(mail blade file template)
        ->attachData($this->pdf->output(), 'Bill.pdf', [
            'mime' => 'application/pdf',
        ])
        ->with('content',$this->content);
    }
}
