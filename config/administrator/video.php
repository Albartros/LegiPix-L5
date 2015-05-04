<?php

return array(

   /**
   * Model title
   * @type string
   */
   'title' => 'Gestion des Vidéos',

   /**
   * The singular name of your model
   * @type string
   */
   'single' => 'vidéo',

   /**
   * The class name of the Eloquent model that this config represents
   * @type string
   */
   'model' => 'App\Video',

   /**
   * The columns array
   * @type array
   */
   'columns' => array(
      'name' => array(
         'title' => 'Nom de la Vidéo',
         'output' => '<div style="position: relative;top: 85px;">(:value)</div>'
      ),
      'video' => array(
         'title' => 'ID YouTube de la Vidéo et Thumbnail',
         'output' => '<div style="display: inline-block;width: 150px;position: relative;bottom: 80px;">(:value)</div><img width="320" src="http://img.youtube.com/vi/(:value)/mqdefault.jpg">'
      ),
      'created_at' => array(
         'title' => 'Mise en ligne',
         'output' => '<div style="position: relative;top: 85px;">(:value)</div>'
      ),
   ),

   'filters' => array(
      'name' => array(
         'title' => 'Nom de la Vidéo'
      ),
      'video' => array(
         'title' => 'ID YouTube'
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
         'title' => 'Nom de la Vidéo'
      ),
      'video' => array(
         'title' => 'ID YouTube'
      )
   )
);