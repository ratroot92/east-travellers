<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class detailMail extends Mailable
{
    use Queueable, SerializesModels;
    public $inquiry;
    public $activity;
    public $object;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    //     public function __construct($inquiry,$activity)
    //     {
    //          $this->inquiry=$inquiry;
    //          $this->activity=$activity;
    //     }
    public function __construct($object)
    {

        $this->object = $object;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email_templates/detailMail');
    }
}
