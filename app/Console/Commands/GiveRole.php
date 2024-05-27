<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GiveRole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:give-role';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Give a role to a user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $loop = true;
        while ($loop) {
            $email = $this->ask('Enter the email of the user');
            $role = $this->ask('Enter the role to give to the user');
            $user = \App\Models\User::where('email', $email)->first();
            if ($user) {
                $user->assignRole($role);
                $this->info('Role given successfully!');
            } else {
                $this->error('User not found!');
            }
            $loop = $this->confirm('Do you want to give another role to a user?');
        }
        $this->info('Bye!');
    }
}
