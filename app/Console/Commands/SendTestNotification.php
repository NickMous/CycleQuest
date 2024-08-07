<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Notifications\TestNotification;
use Illuminate\Console\Command;
use Illuminate\Contracts\Console\PromptsForMissingInput;

use function Laravel\Prompts\search;

class SendTestNotification extends Command implements PromptsForMissingInput
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-test-notification {user} {status=success}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a test notification to an user';

    private $user;

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->user = User::findOrFail($this->argument('user'));
        $this->info("Sending a test notification to user {$this->argument('user')} with status {$this->argument('status')}.");
        $this->info('Sleeping for 5 seconds...');
        sleep(5);
        $this->user->notify(new TestNotification($this->argument('status')));
    }

    protected function promptForMissingArgumentsUsing()
    {
        return [
            'user' => fn () => search('Select the user', fn ($value) => strlen($value) > 0
                ? User::pluck('name', 'id')->toArray()
                : []),
            'status' => fn () => $this->choice('Select the status', ['success', 'error']),
        ];
    }
}
