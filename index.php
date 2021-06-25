<?php
// define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('ROOT', 'C:/Servers/wamp64/www');
require_once ROOT.'/sys/autorun.php';
if(!empty(Request::$URI['PARAMETER'])){
	try{
		$data								= explode('|', Request::$URI['DATA']);
		if(!empty($data[0]) || !empty($data[1])){
			$class								= $data[0];
			$func								= $data[1];
			$class::$func(json_decode(Request::$URI['PARAMETER'], true));
		}else{
			Response::error(Request::$URI['DATA']);
		}
	}catch(\Throwable $e){
		Response::error(Request::$URI['DATA']);
	}
}else{
	Admin::home();
}