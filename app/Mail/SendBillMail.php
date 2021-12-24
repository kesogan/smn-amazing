<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendBillMail extends Mailable
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
        //         // $mail->attachData(base64_decode($this->pdf), 'bill.pdf', [
        // //     'mime' => 'application/pdf',
        // // ]);
        // dd('ee');
        // $mail=$this->subject('The Bill',['content'=>$this->content])->markdown('emails.comfirmail'); //here is your mail content(mail blade file template)
        // dd("not job");
        // $mail->attachData(base64_decode($this->pdf), 'bill.pdf', [
        //     'mime' => 'application/pdf',
        // ]);
        return $this->markdown('emails.comfirmail') //here is your mail content(mail blade file template)
        ->with('content',$this->content);
        //return $this->view('emails.job.billMail');
    }
}
