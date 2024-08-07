<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Contracts\Console\PromptsForMissingInput;

use function Laravel\Prompts\search;

class AssignRole extends Command implements PromptsForMissingInput
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:assign-role {user} {role}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assign a role to an user.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = User::findOrFail($this->argument('user'));
        $role = $this->argument('role');

        $user->assignRole($role);

        $this->info("The role {$role} has been assigned to the user {$user->name}.");
    }

    protected function promptForMissingArgumentsUsing()
    {
        return [
            'user' => fn () => search('Select the user', fn ($value) => strlen($value) > 0
                ? User::pluck('name', 'id')->toArray()
                : []),
            'role' => fn () => $this->choice('Select the role', ['admin']),
        ];
    }
}
