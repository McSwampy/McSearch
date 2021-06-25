<?php
class User {
	public $ID;
	public static $loggedIn									= false;
	public static $record;
	
	public static function init(){
		if(Session::$record['user'] != 0)
			self::login((int)Session::$record['user']);
	}
	
	public static function login(int $id){
		self::$record										= DB::getRecord('users', ['id'=>$id]);
		if(self::$record != false)
			self::$loggedIn									= true;
	}
}