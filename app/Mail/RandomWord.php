<?php

namespace App\Mail;

use App\Models\Vocabulary;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RandomWord extends Mailable
{
    use Queueable, SerializesModels;


    /**
     * @var Vocabulary[]
     */
    public $vocabularies;

    /**
     * RandomWord constructor.
     * @param Vocabulary[] $vocabularies
     */
    public function __construct($vocabularies)
    {
        $this->vocabularies = $vocabularies;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from.address'))
            ->markdown('email.vocabulary.random');
    }
}
