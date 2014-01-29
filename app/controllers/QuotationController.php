<?php

class QuotationController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}
	
	public function index(){
		$quotation = DB::select('SELECT id, quotation_name, status, last_updated FROM quotation WHERE del = 0');
		return View::make('index', array('quotations' => $quotation))
					->nest('silder', 'silder');
	}

}