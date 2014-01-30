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
		$quotations = DB::select('SELECT id, quotation_name, status, last_updated FROM quotation WHERE del = 0');
		return View::make('quotation/index', array('quotations' => $quotations))
					->nest('silder', 'silder');
	}
	
	public function detail($id){
		$quotation = DB::table('quotation')->where('id', $id)->first();
		$quotation_items = DB::select('SELECT * FROM item WHERE quotation_id = ?', array($id));
		
		$company = DB::table('company')->where('id', $quotation->company_id)->first();
		
		return View::make('quotation/detail', array('quotation' => $quotation,
													'items' => $quotation_items,
													'company' => $company))
					->nest('silder', 'silder');
	}

}