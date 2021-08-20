<?php

namespace App\Mail\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DemoSendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $name;

    public function __construct()
    {
        $this->name = "FPT Polytechnic";
    }


    public function build()
    {
        $name ="Mai Thị Gấm";
        return $this->view('mails.demo_mail');
    }
}
