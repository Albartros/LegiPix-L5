<?php

return array(
   /**
    * Model title
    *
    * @type string
    */
   'title' => 'Gestion des Forums',

   /**
    * The singular name of your model
    *
    * @type string
    */
   'single' => 'forum',

   /**
    * The class name of the Eloquent model that this config represents
    *
    * @type string
    */
   'model' => 'App\Forum',

   /**
    * The columns array
    *
    * @type array
    */
   'columns' => array(
      'name' => array(
         'title' => 'Nom'
      ),
      'thumbnail' => array(
         'title' => 'Thumbnail',
         'output' => '<img src="/uploads/forum/(:value)" height="64">',
         'sortable' => false
      ),
      'text' => array(
         'title' => 'text',
         'sortable' => false
      ),
      'topics' => array(
         'title' => 'Sujets'
      ),
      'posts' => array(
         'title' => 'Messages'
      ),
      'forum_cat' => array(
         'title' => 'Catégorie',
         'relationship' => 'category',
         'select' => "(:table).name"
      ),
      'position' => array(
         'title' => 'Position'
      ),

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
         'title' => 'Nom'
      ),
      'text' => array(
         'title' => 'text'
      ),
      'thumbnail' => array(
         'title' => 'Thumbnail',
         'type' => 'image',
         'location' => 'uploads/forum/',
         'naming' => 'random'
      ),
      'slug' => array(
         'title' => 'Slug dans l\'URL'
      ),
      'category' => array(
         'title' => 'Catégorie',
         'type' => 'relationship', //this is the name of the Eloquent relationship method
         'name_field' => 'name',
      ),
      'position' => array(
         'title' => 'Position'
      )
   )
);