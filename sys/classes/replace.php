<?php
class Replace {
	public static $replaceArray									= [];
	
	public static function add($name, $value){
		self::$replaceArray[$name]								= $value;
	}
	
	public static function addArray($array){
		foreach($array as $k=>$v){
			self::$replaceArray[$k]								= $v;
		}
	}
	
	public static function string(string $string){
		foreach(self::$replaceArray as $k=>$v){
			$string												= str_replace('{#'.$k.'}', $v, $string);
		}
		return $string;
	}
}