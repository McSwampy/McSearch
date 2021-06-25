<?php
class Response {
	
	private static $I;
	private $actions										= [];
	
	public function __construct(){
		Response::$I								= $this;
	}
	
	public static function setClass($id, $value){
		self::$I->output('SET_CLASS', [
			'ID'									=> $id,
			'VALUE'									=> $value
		]);
	}
	
	public static function changeValue($id, $value){
		self::$I->output('VALUE', [
			'ID'									=> $id,
			'VALUE'									=> $value
		]);
	}
	
	public static function changeInnerHTML($id, $value){
		self::$I->output('INNERHTML', [
			'ID'									=> $id,
			'VALUE'									=> $value
		]);
	}
	
	public static function hide($id){
		self::$I->output('HIDE', $id);
	}
	
	public static function show($id){
		self::$I->output('SHOW', $id);
	}
	
	public static function error($message, $stop=false){
		self::$I->output('ERROR', $message);
		if($stop)
			die();
	}
	
	public static function success($message){
		self::$I->output('SUCCESS', $message);
	}
	
	public static function warning($message){
		self::$I->output('WARNING', $message);
	}
	
	private function output($action, $data){
		self::$I->actions[]								= [
			'ACTION'									=> $action,
			'CONTENT'									=> $data
		];
	}
	
	public function __destruct(){
		header('application/json');
		echo json_encode($this->actions);
	}
}