<?php
// define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('ROOT', 'C:/Servers/wamp64/www');
require_once ROOT.'/sys/autorun.php';
if(!empty(Request::$URI['PARAMETER'])){
	$data								= explode('|', Request::$URI['DATA']);
	$class								= $data[0];
	$func								= $data[1];
	$class::$func(json_decode(Request::$URI['PARAMETER'], true));
}else{
	Admin::home();
}