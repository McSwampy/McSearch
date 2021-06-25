<?php
class User {
	private static $I;
	
	public static $rec;
	public static $loggedIn						= false;
	
	public static function Init(){
		session_start();
		if(!empty($_SESSION['UID']))
			self::$rec							= DB::getRecord('users', ['id'=>Cryp::decrypt($_SESSION['UID'])]);
		if(self::$rec != null){
			if(self::$rec['active']){
				Replace::addArray(self::$rec);
				self::$loggedIn					= true;
			}
			else
				Response::error('Account no longer active', true);
		}
	}
	
	public static function list(){
		$users									= DB::getRecords('users');
		Replace::add('USERS', $users);
		Template::toJS('admin/users.html');
	}
	
	public static function login(){
		if(
			empty(Request::$URI['USER']) ||
			empty(Request::$URI['PASSWORD'])
		){
			Response::error('Not all fields are valid', true);
		}else{
			self::$rec							= DB::getRecord('users', ['name'=>Request::$URI['USER']]);
			if(self::$rec == false){
				Response::error('User not found', true);
			}else{
				if(Request::$URI['PASSWORD'] != self::$rec['pass']){
					Response::error('Invalid password', true);
				}else{
					if(!self::$rec['active'])
						Response::error('Account not active', true);
					else{
						self::$loggedIn				= true;
						$_SESSION['UID']			= Cryp::encrypt(self::$rec['id']);
						Response::success('Login succesfull');
					}
				}
			}
		}
	}
}