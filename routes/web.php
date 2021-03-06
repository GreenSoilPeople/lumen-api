<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api/v1'], function($router) {

    //posts
    $router->group(['prefix' => 'posts'], function($router) {

        //protected post routes
        $router->group(['middleware' => 'auth'], function($router) {
            $router->post('add', 'PostsController@createPost');
            $router->put('edit/{id}', 'PostsController@updatePost');
            $router->delete('delete/{id}', 'PostsController@deletePost');
            
        });
        
        //public post routes
        $router->get('view/{id}', 'PostsController@viewPost');
        $router->get('index', 'PostsController@index');
    });

    //users
    $router->group(['prefix' => 'users'], function($router) {
        $router->put('add', 'UsersController@add');
        $router->get('view/{id}', 'UsersController@view');
        $router->put('edit/{id}', 'UsersController@edit');
        $router->delete('delete/{id}', 'UsersController@delete');
        $router->get('index', 'UsersController@index');
    });

});
