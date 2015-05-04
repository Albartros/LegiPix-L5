<?php

return array(
   /**
    * Model title
    *
    * @type string
    */
   'title' => 'Gestion des Messages',

   /**
    * The singular name of your model
    *
    * @type string
    */
   'single' => 'message',

   /**
    * The class name of the Eloquent model that this config represents
    *
    * @type string
    */
   'model' => 'App\Post',

   /**
    * The columns array
    *
    * @type array
    */
   'columns' => array(
      'user_name' => array(
         'title' => 'Auteur',
         'relationship' => 'getAuthor', //this is the name of the Eloquent relationship method!
         'select' => "(:table).username"
      ),
      'post_topic' => array(
         'title' => 'Sujet',
         'relationship' => 'getTopic', //this is the name of the Eloquent relationship method!
         'select' => "(:table).name"
      ),
      'text' => array(
         'title' => 'Contenu du message',
         'output' => '<div style="max-height: 300px;overflow-y: scroll">(:value)</div>',
         'sortable' => false
      ),
      'created_at' => array(
         'title' => 'Date',
         'type' => 'date'
      )
   ),

   'sort' => array(
      'field' => 'created_at',
      'direction' => 'desc'
   ),

   'filters' => array(
      'id' => array(
         'type' => 'key',
         'title' => 'ID'
      ),
      'created_at' => array(
        'title' => 'Date',
        'type' => 'date'
      ),
   ),

   'form_width' => 800,

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
      'getAuthor' => array(
         'title' => 'Auteur',
         'type' => 'relationship', //this is the name of the Eloquent relationship method
         'name_field' => 'username',
      ),
      'getTopic' => array(
         'title' => 'Sujet',
         'type' => 'relationship', //this is the name of the Eloquent relationship method
         'name_field' => 'name',
      ),
      'text' => array(
         'title' => 'Contenu du message',
         'type' => 'textarea'
      )
   )
);