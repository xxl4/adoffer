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
    $router->get('offer/show', "OfferController@show")->name('admin.offer');
    $router->post('offer/formList', "OfferController@show", 'admin.formList');
    $router->post('offer/query', 'OfferController@query')->name('admin.query');
    $router->resource('offer_track', 'OfferTrackController')->names('admin.OfferTrack');
    $router->resource('offer_track_cate', 'OfferTrackCatesController')->names('admin.OfferTrackCates');
    $router->resource('creatives', 'CreativesController')->names('admin.Creatives');
    $router->resource('offer_log', 'OfferLogController')->names('admin.OfferLog');
    $router->resource('land_page', 'LandPageController')->names('admin.LandPage');



    $router->get('intelligence/echat', "IntelligenceController@echat")->name('admin.intelligence');
    $router->get('intelligence/offerPie', "IntelligenceController@offerPie")->name('admin.intelligence');
    $router->get('intelligence/countryPie', "IntelligenceController@countryPie")->name('admin.intelligence');

    $router->resource('offer_advanced', 'OfferAdvancedController')->names('admin.OfferAdvanced');
    $router->post('intelligence/query', 'IntelligenceController@query')->name('admin.query');
    $router->post('analytics/query', 'AnalyticsController@query')->name('admin.query');

    $router->get('analytics/echat', "AnalyticsController@echat")->name('admin.analytics');
});
