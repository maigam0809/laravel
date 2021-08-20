<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// 2. Products
Route::group(['prefix' =>'products', 'namespace' =>'Api'] , function(){
    Route::get('/','ProductController@index')->name('index');
    Route::get('/{product}','ProductController@show')->name('show');
    Route::put('/{product}','ProductController@update')->name('show');
    Route::delete('/{product}','ProductController@delete')->name('delete');



    // Route::post('store','Api\ProductController@store')->name('store');
    // Route::post('update/{product}','Api/ProductController@update')->name('update');
    // Route::post('delete/{product}','Api/ProductController@delete')->name('delete');
});
