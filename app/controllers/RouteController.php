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
	public function LoginCheck()
	{
		$LName = Input::get('Password');
		$LPassword = Input::get('Password');
		$SaveMode = Input::get('SaveMode');
		
		$data = DB::Select("SELECT * FROM UserInfo WHERE login_name = '". $LName ."' AND login_password = '". $LPassword ."'");

		if (count($data) == 0){
			echo (string)count($data);
		}else{
			$e_time = ($SaveMode == "false") ? 0 : time()+60*60*24*7;
			
			//Reset Cookie
			setcookie("decoration_uid", "", 0);
			setcookie("decoration_cname", "", 0);
			setcookie("decoration_ename", "", 0);
			
			setcookie("decoration_uid", $data[0]->login_name, $e_time, "/");
			setcookie("decoration_cname", $data[0]->user_chi_name, $e_time, "/");
			setcookie("decoration_ename", $data[0]->user_eng_name, $e_time, "/");
			
			return "OK";
		}
	}
	
	public function Logout()
	{
		setcookie("decoration_uid", "", 0);
		setcookie("decoration_cname", "", 0);
		setcookie("decoration_ename", "", 0);
		
		return Redirect::to('/');
	}
}