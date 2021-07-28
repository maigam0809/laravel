<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;


Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' =>'admin','as' => 'admin.','namespace' =>'Admin'],function(){
    // 1. Users
    Route::group(['prefix' =>'users','as' => 'users.'],function(){
        Route::get('/','UserController@index')->name('index');
        Route::get('create','UserController@create')->name('create');
        Route::post('store','UserController@store')->name('store');
        Route::get('edit/{user}','UserController@edit')->name('edit');
        Route::post('update/{user}','UserController@update')->name('update');
        Route::get('/{user}','UserController@show')->name('show');
        Route::post('delete/{user}','UserController@delete')->name('delete');
    });

    // 2. Categories
    Route::group(['prefix' =>'categories','as' => 'categories.'],function(){
        Route::get('/','CategoryController@index')->name('index');
        Route::get('create','CategoryController@create')->name('create');
        Route::post('store','CategoryController@store')->name('store');
        Route::get('edit/{category}','CategoryController@edit')->name('edit');
        Route::post('update/{category}','CategoryController@update')->name('update');
        Route::get('/{category}','CategoryController@show')->name('show');
        Route::post('delete/{category}','CategoryController@delete')->name('delete');
    });

    // 2. Products
    Route::group(['prefix' =>'products','as' => 'products.'],function(){
        Route::get('/','ProductController@index')->name('index');
        Route::get('create','ProductController@create')->name('create');
        Route::post('store','ProductController@store')->name('store');
        Route::get('edit/{product}','ProductController@edit')->name('edit');
        Route::post('update/{product}','ProductController@update')->name('update');
        Route::get('/{product}','ProductController@show')->name('show');
        Route::post('delete/{product}','ProductController@delete')->name('delete');
    });


});

