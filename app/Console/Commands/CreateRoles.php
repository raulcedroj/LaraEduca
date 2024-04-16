<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;

class CreateRoles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-roles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates roles profesor, alumno, and admin using Spatie Laravel Permission';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Create the role
        Role::create(['name' => 'profesor']);
        Role::create(['name' => 'alumno']);
        Role::create(['name' => 'admin']);
    }
}
