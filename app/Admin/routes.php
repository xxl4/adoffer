<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Dcat\Admin\Admin;

Admin::routes();

Route::group([
    'prefix'     => config('admin.route.prefix'),
    'namespace'  => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('users', 'UserController');
    $router->resource('offer', 'OfferController');
    $router->resource('offer/offerTrack', 'OfferController');
    $router->resource('notifica', 'notificaController');
    $router->resource('sale_record', 'SaleRecordController');
    $router->resource('offer_log', 'OfferLogController');
});
