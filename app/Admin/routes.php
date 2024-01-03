<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('users', UserController::class);
//    $router->resource('offers', OfferController::class);
    $router->resource('product', ProductController::class);
    $router->resource('offer', 'OfferController')->names('admin.Offer');
    //$router->resource('product/show', 'ProductController')->names('admin.Product');

    $router->get('product/show', "ProductController@show")->name('admin.product');
});
