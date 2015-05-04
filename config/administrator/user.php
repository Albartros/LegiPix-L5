<?php

return array(

    /**
    * Model title
    * @type string
    */
    'title' => 'Gestion des Membres',

    /**
    * The singular name of your model
    * @type string
    */
    'single' => 'membre',

    /**
    * The class name of the Eloquent model that this config represents
    * @type string
    */
    'model' => 'App\User',

    /**
    * The columns array
    * @type array
    */
    'columns' => array(
    'name' => array(
    'title' => 'Pseudonyme'
    ),
    'posts' => array(
    'title' => 'Messages'
    ),
    'email' => array(
    'title' => 'Adresse e-mail'
    ),
    'created_at' => array(
    'title' => 'Création'
    ),
    'online_at' => array(
    'title' => 'Dernière visite'
    ),
    ),

    /**
    * The filters array
    * @type array
    */
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

    /**
    * The edit fields array
    * @type array
    */
    'edit_fields' => array(
    'id' => array(
    'type' => 'key',
    'title' => 'ID'
    ),
    'name' => array(
    'title' => 'Pseudo',
    'type' => 'text'
    ),
    'email' => array(
    'title' => 'Adresse e-mail',
    'type' => 'text'
    ),
    'confirmed' => array(
    'type' => 'bool',
    'title' => 'Vérifié'
    ),
    'contact_xbox' => array(
    'title' => 'Xbox',
    'type' => 'text'
    ),
    'contact_playstation' => array(
    'title' => 'PSN',
    'type' => 'text'
    ),
    'contact_steam' => array(
    'title' => 'Steam',
    'type' => 'text'
    ),
    'contact_twitter' => array(
    'title' => 'Twitter',
    'type' => 'text'
    ),
    'contact_youtube' => array(
    'title' => 'Youtube',
    'type' => 'text'
    )
    )
);