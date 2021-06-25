<?php
class Request {
	
	public static $URI;
	
	public static function get(){
		if(!empty($_SERVER))								self::getFrom($_SERVER);
		if(!empty($_POST))									self::getFrom($_POST);
		if(!empty($_GET))									self::getFrom($_GET);
		Replace::addArray(self::$URI);
	}
	
	private static function getFrom($array){
		foreach($array as $k=>$val){
			if(substr($val, 0, 5) == 'HMAC|'){
				self::$URI[strtoupper($k)]					= Cryp::decrypt(ltrim($val, 'HMAC|'));
			}
			else
				self::$URI[strtoupper($k)]					= $val;
		}
	}
}