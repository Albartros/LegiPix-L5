<?php

return array(
   /**
    * Model title
    *
    * @type string
    */
   'title' => 'Gestion des Catégories',

   /**
    * The singular name of your model
    *
    * @type string
    */
   'single' => 'catégorie',

   /**
    * The class name of the Eloquent model that this config represents
    *
    * @type string
    */
   'model' => 'App\CategoryForum',

   /**
    * The columns array
    *
    * @type array
    */
   'columns' => array(
      'name' => array(
         'title' => 'Nom'
      ),
      'text' => array(
         'title' => 'text',
         'sortable' => false
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
      'position' => array(
         'title' => 'Position',
         'type' => 'number'
      )
   )
);