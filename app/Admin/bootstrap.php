<?php

/**
 * Laravel-admin - admin builder based on Laravel.
 * @author z-song <https://github.com/z-song>
 *
 * Bootstraper for Admin.
 *
 * Here you can remove builtin form field:
 * Encore\Admin\Form::forget(['map', 'editor']);
 *
 * Or extend custom form field:
 * Encore\Admin\Form::extend('php', PHPEditor::class);
 *
 * Or require js and css assets:
 * Admin::css('/packages/prettydocs/css/styles.css');
 * Admin::js('/packages/prettydocs/js/main.js');
 *
 */

Encore\Admin\Form::forget(['map', 'editor']);


//Admin::js("/vendor/laravel-admin/analytic/Chart.min.js");


//Admin::js("/vendor/laravel-admin/tests/select2.js");
//Admin::js("/vendor/laravel-admin/analytic/echarts.min.js");
//Admin::js("/vendor/laravel-admin/tests/functions.js");

//Admin::js("/vendor/laravel-admin/tests/summary.js");
app('view')->prependNamespace('admin', resource_path('views'));
