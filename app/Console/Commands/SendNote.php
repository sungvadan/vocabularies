<?php

namespace App\Console\Commands;

use App\Mail\RandomNote;
use App\Models\User;
use App\Services\RandomNoteService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendNote extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:send:note {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send random word to email';
    /**
     * @var RandomNoteService
     */
    private $randomNoteService;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(RandomNoteService $randomNoteService)
    {
        parent::__construct();
        $this->randomNoteService = $randomNoteService;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $email = $this->argument('email');
        $user = User::where('email', $email)->firstOrFail();
        $parsedown = new \Parsedown();

        $randoms = $parsedown->parse($this->randomNoteService->getRandomNoteForUser($user));
        Mail::to($email)->send(new RandomNote($randoms));
    }
}
