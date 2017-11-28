<?php
/**
 * Created by PhpStorm.
 * User: shengj
 * Date: 2017/11/24
 * Time: 16:04
 */

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', [
    "namespace" => "App\\Http\\Controllers",
],function ($api) {
    $api->post("/token","UserController@store");
    $api->post("/login","UserController@login");
});

$api->version('v1', [
    "namespace" => "App\\Http\\Controllers",
    'middleware' => [
        'api.auth',
    ],
],function ($api) {
    $api->get("/","PostsController@index");
    $api->get("/config",function (){
        return config('api');
    });
});

$api->version('v2', ["namespace" => "App\\Http\\Controllers"],function ($api) {
    $api->get("/","PostsController@index");
});

