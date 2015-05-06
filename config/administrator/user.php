<?php

return array(

    'title' => 'Gestion des Membres',

    'single' => 'membre',

    'model' => 'App\User',

    'columns' => array(
        'name' => array(
            'title' => 'Pseudo',
        ),
        'nbr_posts' => array(
            'title' => '#Posts',
        ),
        'nbr_comments' => array(
            'title' => '#Comms',
        ),
        'nbr_topics' => array(
            'title' => '#Topics',
        ),
        'rank' => array(
            'output' => function($value)
            {
                return App\User::find($value)->getUserRank();
            },
            'select' => '(:table).id',
            'sortable' => false,
            'title' => 'Rang',
        ),
        'roles' => array(
            'relationship' => 'roles',
            'select' => "GROUP_CONCAT((:table).display_name SEPARATOR ', ')",
            'title' => 'Rôles',
        ),
        'email' => array(
        'title' => 'Adresse e-mail',
        ),
        'created_at' => array(
        'title' => 'Création',
        ),
        'online_at' => array(
        'title' => 'Dernière visite',
        ),
    ),

    'filters' => array(
    'username' => array(
    'title' => 'Pseudonyme'
    ),
    'confirmed' => array(
    'title' => 'Verifié',
    'type' => 'bool'
    ),
    'created_at' => array(
    'title' => 'Création',
    'type' => 'date'
    )
    ),

    'edit_fields' => array(
        'id' => array(
            'title' => 'ID',
            'type' => 'key',
        ),
        'name' => array(
            'title' => 'Pseudo',
            'type' => 'text',
        ),
        'email' => array(
            'title' => 'Adresse e-mail',
            'type' => 'text',
        ),
        'confirmed' => array(
            'title' => 'Vérifié',
            'type' => 'bool',
        ),
        'ctc_xbox_live' => array(
            'title' => 'Xbox',
            'type' => 'text',
        ),
        'ctc_playstation' => array(
            'title' => 'PSN',
            'type' => 'text',
        ),
        'ctc_steam' => array(
            'title' => 'Steam',
            'type' => 'text',
        ),
        'ctc_twitch' => array(
            'title' => 'Twitch',
            'type' => 'text',
        ),
        'ctc_skype' => array(
            'title' => 'Skype',
            'type' => 'text',
        ),
        'ctc_twitter' => array(
            'title' => 'Twitter',
            'type' => 'text',
        ),
        'ctc_facebook' => array(
            'title' => 'Facebook',
            'type' => 'text',
        ),
        'ctc_youtube' => array(
            'title' => 'Youtube',
            'type' => 'text',
        ),
        'ctc_internet' => array(
            'title' => 'Site Web',
            'type' => 'text',
        ),
    )
);
