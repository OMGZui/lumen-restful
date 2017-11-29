<?php
/**
 * Created by PhpStorm.
 * User: shengj
 * Date: 2017/11/23
 * Time: 11:51
 */


$router->group([
    'prefix' => 'api',
    "namespace" => "V1",
], function () use ($router) {

    $router->get('/', function () use ($router) {
        return $router->app->version();
    });
    $router->get('/posts', 'PostsController@index');
    $router->post('/posts', 'PostsController@store');
    $router->get('/posts/{id}', 'PostsController@show');
    $router->put('/posts/{id}', 'PostsController@update');
    $router->patch('/posts/{id}', 'PostsController@update');
    $router->delete('/posts/{id}', 'PostsController@destroy');
});
