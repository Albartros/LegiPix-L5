<?php

return array(
    'title' => 'Gestion des Vidéos',

    'single' => 'vidéo',

    'model' => 'App\Video',

    'columns' => array(
        'name' => array(
            'title' => 'Nom de la Vidéo',
            'output' => '<div style="position: relative;top: 85px;">(:value)</div>',
        ),
        'video_id' => array(
            'title' => 'ID YouTube et Vidéo',
            'output' => '<div style="display: inline-block;width: 150px;position: relative;bottom: 80px;">(:value)</div><a target="_blank" href="https://www.youtube.com/watch?v=(:value)"><img width="320" src="http://img.youtube.com/vi/(:value)/mqdefault.jpg"></a>',
        ),
        'created_at' => array(
            'title' => 'Mise en ligne',
            'output' => '<div style="position: relative;top: 85px;">(:value)</div>',
        ),
    ),

    'filters' => array(
        'name' => array(
            'title' => 'Nom de la Vidéo',
        ),
        'video_id' => array(
            'title' => 'ID YouTube',
        )
    ),

    'edit_fields' => array(
        'id' => array(
            'type' => 'key',
            'title' => 'ID',
        ),
        'name' => array(
            'title' => 'Nom de la Vidéo',
        ),
        'video_id' => array(
            'title' => 'ID YouTube',
        )
    )
);
