<?php

use Illuminate\Database\Seeder;

use App\Role;

class RoleTableSeeder extends Seeder {

    public function run()
    {
        // Create founder role
        Role::create(array(
            'name' => 'founder',
            'display_name' => 'Fondateur',
            'description' => 'Fondateur du projet',
        ));

        // Create admin role
        Role::create(array(
            'name' => 'admin',
            'display_name' => 'Administrateur',
            'description' => 'Administrateur du site',
        ));

        // Create moderator role
        Role::create(array(
            'name' => 'mod',
            'display_name' => 'Modérateur',
            'description' => 'Modérateur de la communauté',
        ));

        // Create publisher role
        Role::create(array(
            'name' => 'author',
            'display_name' => 'Rédacteur',
            'description' => 'Rédacteur des articles',
        ));

        // Create team "role"
        Role::create(array(
            'name' => 'team',
            'display_name' => 'Équipe',
            'description' => 'Pilier de la communauté',
        ));
    }
}
