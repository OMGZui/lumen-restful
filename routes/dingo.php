<?php
/**
 * Created by PhpStorm.
 * User: shengj
 * Date: 2017/11/24
 * Time: 16:04
 */

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', [
    "namespace" => "App\\Http\\Controllers\\V1",
],function ($api) {

    //user
    $api->post("/token","UserController@store");
    $api->post("/login","UserController@login");

    //auth
    $api->group([
        'middleware' => [
            'auth',
        ],
    ],function ($api){
        $api->get("/token","UserController@show");
        $api->get("/","PostsController@index");
        $api->get("/config",function (){
            return config('api');
        });
    });
});

$api->version('v2', ["namespace" => "App\\Http\\Controllers\\V2"],function ($api) {
    $api->get("/","PostsController@index");
});

