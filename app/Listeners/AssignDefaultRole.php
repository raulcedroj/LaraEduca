<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Spatie\Permission\Models\Role;

class AssignDefaultRole
{
    /**
     * Handle the event.
     *
     * @param  Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        // Busca el rol predeterminado por su nombre
        $defaultRole = Role::where('name', 'alumno')->first();

        // Asigna el rol al usuario recién registrado
        if ($defaultRole) {
            //$event->user->assignRole($defaultRole);
        }
    }
}
