<?php

return array(

    'title' => 'Gestion des Rôles',

    'single' => 'rôle',

    'model' => 'App\Role',

    'columns' => array(
        'name' => array(
            'title' => 'Nom dans l\'application',
        ),
        'display_name' => array(
            'title' => 'Nom affiché',
        ),
        'description' => array(
            'sortable' => false,
            'title' => 'Description du rôle',
        ),
    ),

    'sort' => array(
        'field' => 'display_name',
    ),

    'edit_fields' => array(
        'id' => array(
            'title' => 'ID',
            'type' => 'key',
        ),
        'name' => array(
            'title' => 'Nom dans l\'application',
        ),
        'display_name' => array(
            'title' => 'Nom affiché',
        ),
        'description' => array(
            'title' => 'Description du rôle',
        ),
    )
);
