<?php
class Template {
	public static function load(string $name, string $location){
		$fileLocation									= ROOT.'/templates/'.$location.'/'.$name;
		if(file_exists($fileLocation)){
			$data										= file_get_contents(ROOT.'/templates/'.$location.'/'.$name);
			echo Replace::string($data);
		}
	}
}