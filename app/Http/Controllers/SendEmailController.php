<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ComfirmationMail;
use App\Http\Controllers\Controller;

class SendEmailController extends Controller
{
    /**
     * Ship the given order.
     *
     * @param  Request  $request
     * @param  int  $orderId
     * @return Response
     */
    public function ship(Request $request)
    {
        $valueArray = [
            'firstName' => $request->full_name,
        ];

        // Test mail...
       // dd($request);
        echo 'start Mail ';
        // try {
        //     Mail::to($request->email)->send(new ComfirmationMail($valueArray));
        //     echo 'Mail send successfully';
        // } catch (\Exception $e) {
        //     echo 'Error - '.$e;
        // }
    }
}
