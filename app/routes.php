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
Route::get('/', 'RouteController@RouteCheck');

Route::get('/Login', function()
{
	return View::make("login");
});

Route::post('/Login/Checking', 'GeneralController@LoginValidate');

Route::get('/Quotation', 'QuotationController@index');
Route::get('/Quotation/{id}', 'QuotationController@detail');