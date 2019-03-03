<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/auth/facebook/redirect', 'SinglePageController@facebookAuthRedirect');
Route::get('/auth/facebook/response', 'SinglePageController@facebookAuthResponse');

Route::get('/{any}', [
    'as' => 'homepage',
    'uses' => 'SinglePageController@index'
])->where('any', '.*');
