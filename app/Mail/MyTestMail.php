<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MyTestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
            $this->details =$details;
        
     
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {/* */
        /*  return $this->from('kamalkant14march@gmail.com')
        ->view('email.emailverify',['details'=>$details]); 
       return $this->view('email.emailverify'); */

        return $this->view('email.emailverify')
       ->with(['kamal'=>$this->details]);

      /*  print_r($this->details); exit(); */
    }
}
