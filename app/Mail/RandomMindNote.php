<?php

namespace App\Mail;

use App\Models\MindNote;
use App\Models\Vocabulary;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RandomMindNote extends Mailable
{
    use Queueable, SerializesModels;


    /**
     * @var MindNote
     */
    public $mindNote;

    public function __construct(MindNote $mindNote)
    {
        $this->mindNote = $mindNote;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from.address'))
            ->view('email.mind-note.random');
    }
}
