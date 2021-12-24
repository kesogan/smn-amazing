<?php

namespace App\Jobs;

use App\Mail\SendBillMail;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use PDF;

class SendBillMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $details;
    protected $pdf;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($users,$pdf)
    {
        $this->details=$users;
        $this->pdf=$pdf;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle($users,$pdf)
    {
        $email=new SendBillMail($users,$pdf);
        dd('ss');
        Mail::to($users)->send($email);

    }
}
