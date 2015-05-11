<?php

use Illuminate\Database\Seeder;

use App\Permission;

class PermissionTableSeeder extends Seeder {

    public function run()
    {
        // Impossibility to be banned by a member
        Permission::create(array(
            'name' => 'cantBeBanned',
            'display_name' => 'impossible à bannir',
            'description' => 'Impossibilité à être banni et est le seul à gérer cette règle',
        ));

        // Access to advanced admin pages
        Permission::create(array(
            'name' => 'canFullyAdmin',
            'display_name' => 'Admin avancé',
            'description' => 'Accès au panneaud\'administration avancé',
        ));

        // Access to moderation admin pages
        Permission::create(array(
            'name' => 'canModerate',
            'display_name' => 'Modération de la communauté',
            'description' => 'Accès au panneaud\'administration de modération',
        ));

        // Access to author admin pages
        Permission::create(array(
            'name' => 'canEditArticles',
            'display_name' => 'Edition des articles',
            'description' => 'Accès au panneaud\'administration de rédacteur',
        ));

        // Access to admin page
        Permission::create(array(
            'name' => 'canAccessAdmin',
            'display_name' => 'Accès au panneau d\'administration',
            'description' => 'Accès au panneaud\'administration avancé',
        ));

        // Access to priviledges
        Permission::create(array(
            'name' => 'canBePriviledged',
            'display_name' => 'Privilégié',
            'description' => 'Accès aux privilèges',
        ));
    }
}
