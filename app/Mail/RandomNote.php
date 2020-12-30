<?php

namespace App\Mail;

use App\Services\RandomNoteService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RandomNote extends Mailable
{
    use Queueable, SerializesModels;


    /**
     * @var string
     */
    public $randoms;

    public function __construct(string $randoms)
    {

        $this->randoms = $randoms;
    }

    public function build()
    {
        return $this->view('note.random');
    }
}
