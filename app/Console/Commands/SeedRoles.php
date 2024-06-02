<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class SeedRoles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:seed-roles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed the roles and permissions';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        Role::create(['name' => 'admin']);
        $user = Role::create(['name' => 'user']);

        $travelRoutes = Permission::create(['name' => 'travel routes']);
        $travelRoutes->assignRole($user);

        $manageHealthChecks = Permission::create(['name' => 'manage health checks']);

        $this->info('Roles and permissions seeded successfully!');
    }
}
