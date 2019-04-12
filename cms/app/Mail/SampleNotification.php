<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SampleNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $sendData;
    protected $name;
    protected $team_name;
    protected $team_id;
    

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$team_name,$team_id)
    {
      $this->name = $name;
      $this->team_name = $team_name;
      $this->team_id = $team_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Team-Pod招待メール')
            ->view('emails.sample')
            ->with([
                'name'=>$this->name,
                'team_name'=>$this->team_name,
                'team_id'=>$this->team_id
                ]);
    }
}