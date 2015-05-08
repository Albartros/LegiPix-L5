<?php

use Illuminate\Database\Seeder;

use App\Role;

class LinkPermissionsToRoles extends Seeder {

    public function run()
    {
        // Giving the founder permissions
        $founder = Role::find(1);
        $founder->attachPermission(1);

        // Giving the administrator permissions
        $admin = Role::find(2);
        $admin->attachPermissions(array(2, 3, 4, 5));

        // Giving the moderator permissions
        $mod = Role::find(3);
        $mod->attachPermissions(array(3, 5));

        // Giving the author permissions
        $author = Role::find(4);
        $author->attachPermissions(array(4, 5));

        // Giving the team "permissions"
        $team = Role::find(5);
        $team ->attachPermission(6);
    }
}
