<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // User related seeders
        $this->call('UserTableSeeder');
        $this->call('RoleTableSeeder');
        $this->call('PermissionTableSeeder');
        $this->call('LinkPermissionsToRoles');
        $this->call('MakeFirstMemberFullAdmin');

        // All the other seeders
        $this->call('CountdownTableSeeder');
        $this->call('VideoTableSeeder');
    }

}
