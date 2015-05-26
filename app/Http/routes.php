<?php

/*
 |--------------------------------------------------------------------------
 | Application Routes
 |--------------------------------------------------------------------------
 |
 | Here is where you can register all of the routes for an application.
 | It's a breeze. Simply tell Laravel the URIs it should respond to
 | and give it the controller to call when that URI is requested.
 |
 */
Route::get('/', array(
    'as' => 'index',
    'uses' => 'WelcomeController@index',
));

Route::get('/poster', array(
    'as' => 'poster',
    'uses' => 'WelcomeController@index',
));

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

/*
 |--------------------------------------------------------------------------
 | Gestion des patterns généraux
 |--------------------------------------------------------------------------
 |
 | On a toute une liste de patterns communs à l'ensemble des règles
 | de routing, pour des patterns non spécifiques, on utilise juste {random}.
 |
 */
Route::pattern('id', '[0-9]+');
Route::pattern('slug', '^[a-z0-9]+(?:-[a-z0-9]+)*$');
Route::pattern('page', '[0-9]+');

/*
 |--------------------------------------------------------------------------
 | Gestions des comptes utilisateurs
 |--------------------------------------------------------------------------
 |
 | On a tout un ensemble de règles pour gérer les utilisateurs, une partie
 | est gérée par le package Confide mais une autre partie est custom.
 |
 */
Route::group(
    array('prefix' => 'profil'), function()
    {
        Route::get('/', array(
            'as' => 'u.index',
            'uses' => 'UsersController@index',
        ));

        Route::get('/edit', array(
            'as' => 'u.edit',
            'uses' => 'UsersController@edit',
        ));
    }
);

Route::get('membre/{id}-{username}', array(
    'as' => 'u.view',
    'uses' => 'UsersController@user',
));

/*
 |--------------------------------------------------------------------------
 | Gestions de la partie forum
 |--------------------------------------------------------------------------
 |
 | Le forum est une partie essentielle du site, l'ensemble des routings
 | spécifiques au forum se retrouvent ici.
 |
 */
Route::group(
    array('prefix' => 'forum'), function()
    {
        Route::get('/', array(
            'as' => 'f.index',
            'uses' => 'ForumController@index',
        ));

        Route::get('/{id}-{slug}', array(
            'as' => 'f.forum',
            'uses' => 'ForumController@forum',
        ));

        Route::get('/{random}/{id}-{slug}', array(
            'as' => 'f.topic',
            'uses' => 'ForumController@topic',
        ));
    }
);

/*
 |--------------------------------------------------------------------------
 | Gestions des news du site
 |--------------------------------------------------------------------------
 |
 | Gestion des news du site.
 |
 */
Route::group(
    array('prefix' => 'news'), function()
    {
        Route::get('/', array(
            'as' => 'n.index',
            'uses' => 'ArticlesController@index',
        ));

        Route::get('/{id}-{slug}', array(
            'as' => 'n.category',
            'uses' => 'ArticlesController@category',
        ));

        Route::get('/{random}/{id}-{slug}', array(
            'as' => 'n.article',
            'uses' => 'ArticlesController@article',
        ));
    }
);
