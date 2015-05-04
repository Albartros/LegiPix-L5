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
 | Gestion de la page d'index
 |--------------------------------------------------------------------------
 |
 | La règle la plus importante du site : la redirection en page d'index.
 |
 */
Route::get('/', array(
    'as' => 'index',
    'uses' => 'WelcomeController@index'
));

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

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
        Route::group(
            array('prefix' => '/{id}-{username}'), function()
            {
                Route::get('/', array(
                    'as' => 'm.view',
                    'uses' => 'WelcomeController@index'
                ));

                Route::get('/edit', array(
                    'as' => 'm.edit',
                    'uses' => 'WelcomeController@index'
                ));
            }
        );
    }
);
