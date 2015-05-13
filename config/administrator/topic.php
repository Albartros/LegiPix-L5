<?php

return array(

   /**
    * Model title
    * @type string
    */
   'title' => 'Gestion des Sujets',

   /**
    * The singular name of your model
    * @type string
    */
   'single' => 'sujet',

   /**
    * The class name of the Eloquent model that this config represents
    * @type string
    */
   'model' => 'App\Topic',

   /**
    * The columns array
    * @type array
    */
   'columns' => array(
      'name' => array(
         'title' => 'Nom'
      ),
      'locked' => array(
         'title' => 'Verrouillé'
      ),
      'user_name' => array(
         'title' => 'Auteur',
         'relationship' => 'author',
         'select' => "(:table).name"
      ),
      'forum' => array(
         'title' => 'Forum',
         'relationship' => 'forum',
         'select' => '(:table).name'
      ),
      'last_post_id'
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
         'title' => 'Nom'
      ),
      'slug',
      'locked' => array(
         'type' => 'bool',
         'title' => 'Verrouillé',
      ),
      'author' => array(
         'title' => 'Auteur',
         'type' => 'relationship', //this is the name of the Eloquent relationship method
         'name_field' => 'name',
      ),
      'forum' => array(
         'title' => 'Forum',
         'type' => 'relationship', //this is the name of the Eloquent relationship method
         'name_field' => 'name',
      ),
      'last_post_id' => array(
         'title' => 'Dernier post'
      ),
      'anwsered_at' => array(
         'type' => 'datetime',
         'title' => 'Dernier',
      ),
      /*'description' => array(
         'title' => 'Description'
      ),
      'thumbnail' => array(
         'title' => 'Thumbnail',
         'type' => 'image',
         'location' => 'upload/forums/',
         'naming' => 'random'
      ),
      'slug' => array(
         'title' => 'Slug dans l\'URL'
      ),
      'getCategory' => array(
         'title' => 'Catégorie',
         'type' => 'relationship', //this is the name of the Eloquent relationship method
         'name_field' => 'name',
      ),
      'position' => array(
         'title' => 'Position'
      )*/
   )
);
