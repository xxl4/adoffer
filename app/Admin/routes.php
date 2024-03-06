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
    $router->post('home/dashboard', 'HomeController@dashboard')->name('home');
    $router->any('home/query', 'HomeController@query')->name('home');

    $router->post('home/search', 'HomeController@search')->name("admin.home.data");
    $router->post('home/reporting', 'HomeController@reporting')->name("admin.home.reporting");


    $router->resource('users', UserController::class);
//    $router->resource('offers', OfferController::class);
    $router->resource('product', ProductController::class);


    $router->get('offer/show-v2', "OfferController@showV2")->name('admin.offer.v2');
    $router->post('offers/offer', "OfferController@offer")->name('admin.offer.offer');
    $router->post('offers/intelligence', "OfferController@intelligence")->name('admin.offer.intelligence');
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
    $router->resource('delivery', 'DeliveryController')->names('admin.Delivery');
    $router->resource('category', 'CategoryController')->names('admin.Category');
    $router->resource('products_feed', 'ProductFeedController')->names('admin.ProductFeed');


    $router->get('intelligence/echat', "IntelligenceController@echat")->name('admin.intelligence');
    $router->get('intelligence/offerPie', "IntelligenceController@offerPie")->name('admin.intelligence');
    $router->get('intelligence/countryPie', "IntelligenceController@countryPie")->name('admin.intelligence');

    $router->resource('offer_advanced', 'OfferAdvancedController')->names('admin.OfferAdvanced');
    $router->post('intelligence/query', 'IntelligenceController@query')->name('admin.query');
    $router->post('analytics/query', 'AnalyticsController@query')->name('admin.query');
    $router->get('analytics/echat', "AnalyticsController@echat")->name('admin.analytics');

    $router->resource('fraud_data', 'FraudDataController')->names('admin.FraudData');

//    $router->resource('delivery', 'DeliveryController')->names('admin.Delivery');


    $router->any('tests/echart', "TestsController@echart")->name('admin.tests');


    $router->any('tests/echart', "TestsController@echart")->name('admin.tests');
    $router->get('tests/offerPie', "TestsController@offerPie")->name('admin.tests');
    $router->get('tests/countryPie', "TestsController@countryPie")->name('admin.tests');
    $router->post('tests/query', 'TestsController@query')->name('admin.query');


    $router->resource('track_lists', 'TrackListsController')->names('admin.TrackLists');


    $router->any('intelligences/echat', "IntelligencesController@echat")->name('admin.Intelligences');
    $router->get('intelligences/offerPie', "IntelligencesController@offerPie")->name('admin.Intelligences');
    $router->get('intelligences/countryPie', "IntelligencesController@countryPie")->name('admin.Intelligences');
    $router->post('intelligences/query', 'IntelligencesController@query')->name('admin.query');


});
