<?php

return array(

    'title' => 'Gestion des Rangs',

    'single' => 'rang',

    'model' => 'App\Rank',

    'columns' => array(
        'name' => array(
            'output' => '<div style="text-align:right">(:value)</div>',
            'title' => 'Nom du Rang',
        ),
        'required' => array(
            'output' => function($value)
            {
                return pow(2, $value - 1);
            },
            'select' => '(:table).id',
            'title' => 'Messages requis',
        ),
    ),

    'sort' => array(
        'direction' => 'asc',
        'field' => 'required',
    ),

    'edit_fields' => array(
        'id' => array(
            'title' => 'ID',
            'type' => 'key',
        ),
        'name' => array(
            'title' => 'Nom du Rang',
            'type' => 'text',
        ),
    ),
);
