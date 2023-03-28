<?php

namespace App\Mail;

use App\Models\MindNote;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

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
        return $this
            ->from(config('mail.from.address'))
            ->view('email.mind-note.random', [
                'isPdf' => stripos(Storage::disk('public')->mimeType($this->mindNote->path), 'pdf')
            ])
            ->attachFromStorageDisk('public', $this->mindNote->path);
    }
}
