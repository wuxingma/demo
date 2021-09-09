<?php

Route::group(['namespace' => 'User', 'as' => 'user.'], function ($router) {
    $router->get('/', 'HomeController@index')->name('home');
    $router->post('/register', 'RegisterController@register')->name('register');
    $router->get('/integral_config/index', 'IntegralConfigController@index')->name('integral_config.index');
    $router->get('/integral_config/edit/{id}', 'IntegralConfigController@edit')->name('integral_config.edit');
    $router->post('/integral_config/update', 'IntegralConfigController@update')->name('integral_config.update');
    $router->get('/distribution_system/index', 'DistributionSystemController@index')->name('distribution_system.index');

});
