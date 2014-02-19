<?php

class RouteController extends BaseController {

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
	public function RouteCheck()
	{
		if (isset($_COOKIE["decoration_uid"]) == false || isset($_COOKIE["decoration_cname"]) == false || isset($_COOKIE["decoration_ename"]) == false)
		{
			return Redirect::to('/Login');
		}elseif (isset($_COOKIE["decoration_uid"]) == true && isset($_COOKIE["decoration_cname"]) == true && isset($_COOKIE["decoration_ename"]) == true){
			return Redirect::to('/Quotation');
		}
	}
	
}