<?php

namespace App\Console\Commands;

use App\Mail\RandomMindNote;
use App\Models\MindNote;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendMindNote extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:send:mind-note {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send random mind note to email';

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
        $vocabularies = MindNote::where('user_id', '=', $user->id)->orderByRaw('rand()')->limit(1)->firstOrFail();
        Mail::to($email)->send(new RandomMindNote($vocabularies));
    }
}
