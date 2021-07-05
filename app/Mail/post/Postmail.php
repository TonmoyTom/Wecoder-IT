<?php

namespace App\Mail\post;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Postmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
       
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      
        return $this->subject("New Post")->view('Admin.course.post.email')->with("data", $this->data);
    }
}
