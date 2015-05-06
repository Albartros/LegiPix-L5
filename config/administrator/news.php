<?php

return array(

   /**
   * Model title
   * @type string
   */
   'title' => 'Gestion des Nouvelles',

   /**
   * The singular name of your model
   * @type string
   */
   'single' => 'nouvelle',

   /**
   * The class name of the Eloquent model that this config represents
   * @type string
   */
   'model' => 'App\News',

   /**
   * The columns array
   * @type array
   */
   'columns' => array(
      'name' => array(
         'title' => 'Titre'
      ),
      'thumbnail' => array(
         'title' => 'Thumbnail',
         'output' => '<img width="150" src="/upload/news/(:value).jpg">',
         'sortable' => false
      ),
      'user_name' => array(
         'title' => 'Auteur',
         'relationship' => 'getAuthor', //this is the name of the Eloquent relationship method!
         'select' => '(:table).username'
      ),
      'text' => array(
         'title' => 'Contenu de la Nouvelle',
         'output' => '<div style="max-height: 400px;overflow-y: scroll">(:value)</div>',
         'sortable' => false
      ),
      'new_cat' => array(
         'title' => 'Catégorie',
         'relationship' => 'getCategory', //this is the name of the Eloquent relationship method!
         'select' => '(:table).name'
      ),
      'views' => array(
         'title' => 'Vu'
      ),
      'created_at' => array(
         'title' => 'Date'
      )
   ),

   /**
   * The filters array
   * @type array
   */
   'filters' => array(
      'id' => array(
         'type' => 'key',
         'title' => 'ID'
      ),
      'name' => array(
         'title' => 'Titre'
      ),
      'created_at' => array(
         'title' => 'Date',
         'type' => 'date'
      )
   ),

   /**
   * The form width
   * @type integer
   */
   'form_width' => 800,

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
         'title' => 'Titre'
      ),
      'slug' => array(
         'title' => 'Slug'
      ),
      'getAuthor' => array(
         'title' => 'Auteur',
         'type' => 'relationship', //this is the name of the Eloquent relationship method
         'name_field' => 'username',
      ),
      'getCategory' => array(
         'title' => 'Catégorie',
         'type' => 'relationship', //this is the name of the Eloquent relationship method
         'name_field' => 'name',
      ),
      'text' => array(
         'title' => 'Contenu du la Nouvelle',
         'type' => 'textarea'
      )
   )
);
