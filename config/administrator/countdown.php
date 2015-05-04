<?php

return array(
   /**
    * Model title
    *
    * @type string
    */
   'title' => 'Gestion des Countdowns',

   /**
    * The singular name of your model
    *
    * @type string
    */
   'single' => 'countdown',

   /**
    * The class name of the Eloquent model that this config represents
    *
    * @type string
    */
   'model' => 'App\Countdown',

   /**
    * The columns array
    *
    * @type array
    */
   'columns' => array(
      'name' => array(
         'title' => 'Jeu',
         'output' => '<div style="text-align: center;position: relative;top: 68px;">(:value)</div>'
      ),
      'thumbnail' => array(
         'title' => 'Jaquette',
         'output' => '<img src="/upload/covers/(:value)" height="150">',
         'sortable' => false
      ),
      'released_at' => array(
         'title' => 'Date de sortie',
         'output' => '<div style="position: relative;top: 68px;">(:value)</div>'
      ),
      'created_at' => array(
         'title' => 'Mise en ligne',
         'output' => '<div style="position: relative;top: 68px;">(:value)</div>'
      ),
   ),

   'sort' => array(
      'field' => 'released_at',
      'direction' => 'desc'
   ),

   /**
    * The edit fields array
    *
    * @type array
    */
   'edit_fields' => array(
      'id' => array(
         'type' => 'key',
         'title' => 'ID'
      ),
      'name' => array(
         'title' => 'Jeu',
      ),
      'thumbnail' => array(
         'title' => 'Jaquette',
         'type' => 'image',
         'location' => 'uploads/countdown/',
         'naming' => 'random'
      ),
      'released_at' => array(
         'title' => 'Date de sortie',
         'type' => 'date',
         'date_format' => 'yy-mm-dd'
      )
   )
);