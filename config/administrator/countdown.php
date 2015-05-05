<?php

return array(

    'title' => 'Gestion des Countdowns',

    'single' => 'countdown',

    'model' => 'App\Countdown',

    'columns' => array(
        'name' => array(
            'output' => '<div style="text-align: center;position: relative;top: 68px;">(:value)</div>',
            'title' => 'Jeu',
        ),
        'thumbnail' => array(
            'output' => '<img src="/uploads/countdown/(:value)" height="150">',
            'sortable' => false,
            'title' => 'Jaquette',
        ),
        'released_at' => array(
            'output' => '<div style="position: relative;top: 68px;">(:value)</div>',
            'title' => 'Date de sortie',
        ),
        'created_at' => array(
            'output' => '<div style="position: relative;top: 68px;">(:value)</div>',
            'title' => 'Mise en ligne',
        ),
    ),

    'sort' => array(
        'direction' => 'desc',
        'field' => 'released_at',
    ),

    'edit_fields' => array(
        'id' => array(
            'title' => 'ID',
            'type' => 'key',
        ),
        'name' => array(
            'title' => 'Jeu',
        ),
        'thumbnail' => array(
            'location' => 'uploads/countdown/',
            'naming' => 'random',
            'title' => 'Jaquette',
            'type' => 'image',
        ),
        'released_at' => array(
            'date_format' => 'yy-mm-dd',
            'title' => 'Date de sortie',
            'type' => 'date',
        )
    )
);