<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/**********Login********/
Route::post('/login/login_check', 'RouteController@LoginCheck');

Route::group(array('before' => 'login_auth_check'), function()
{
	Route::get('/', '');
	Route::get('/login', '');
});

Route::group(array('before' => 'quotation_auth_check'), function()
{
	Route::get('/quotation', 'QuotationController@index');
	Route::get('/quotation/{id}', 'QuotationController@detail');
});
/**********Login********/