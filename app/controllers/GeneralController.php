<?php

class GeneralController extends BaseController {

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

	/********************Login***************/
	/*public function LoginValidate()
	{
		$LName = Input::get('UserName');
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
		
	}*/
	/********************Login***************/
	
	//Quick Function
	public function QuickInsertPassword()
	{
		$id = 2;
		$password = "1234";
		$sql = "UPDATE UserInfo Set login_password = '". hash('md5', $password) ."' WHERE id = " . $id;
		$result = DB::update($sql);
		
		if (count($result) > 0){
			echo hash('md5', $password);
			//echo "Success : " . count($result) . " Rows(s)";
		}else{
			echo "Fail";
		}
	}
	
	public function QuickCheckPassword()
	{
		$id = 2;
		$password = "1234";
		$sql = "SELECT * FROM UserInfo WHERE id = " . $id;
		$result = DB::select($sql);
		
		if (count($result) > 0){
			if (Hash::check($password, $result[0]->login_password)){
				echo "Correct";
			}else{
				echo "Fail";
			}
		}else{
			echo "Fail";
		}
	}
}