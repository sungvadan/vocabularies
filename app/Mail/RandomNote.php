<?php

namespace App\Mail;

use App\Services\RandomNoteService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use function Symfony\Component\Translation\t;

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
        $view = view('email.note.random', ['randoms' => $this->randoms]);
        $view = str_replace('<pre>', '<pre style="display: block; padding: 9.5px; margin: 0 0 10px; font-size: 13px; line-height: 1.42857143; color: #333; word-break: break-all; word-wrap: break-word; background-color: #f5f5f5; border: 1px solid #ccc; border-radius: 4px;">', $view);
        $view = str_replace('<table>', '<table style="margin-bottom: 1rem; width: 100%;">', $view);
        $view = str_replace('<td>', '<td style="padding: 7px 13px; border: 1px solid #f1f1f1; vertical-align: middle;">', $view);
        $view = str_replace('<th>', '<th style="padding: 7px 13px; border: 1px solid #f1f1f1; vertical-align: middle;">', $view);
        $view = preg_replace('/<img ([^>]*)>/', '<img $1 width="760">', $view);

        return $this->html($view);
    }
}
