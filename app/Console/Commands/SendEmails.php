<?php

namespace App\Console\Commands;

use App\Mail\RandomWord;
use App\Models\User;
use App\Models\Vocabulary;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:send {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send random word to email';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
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
        $vocabularies = Vocabulary::where('user_id', '=', $user->id)->orderByRaw('rand()')->limit(10)->get();
        Mail::to($email)->send(new RandomWord($vocabularies));
    }
}
