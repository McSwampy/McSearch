<?php
class Response {
	
	private $actions										= [];
	
	public function __construct(){
		
	}
	
	public function setClass($id, $value){
		$this->output('SET_CLASS', [
			'ID'									=> $id,
			'VALUE'									=> $value
		]);
	}
	
	public function changeValue($id, $value){
		$this->output('VALUE', [
			'ID'									=> $id,
			'VALUE'									=> $value
		]);
	}
	
	public function changeInnerHTML($id, $value){
		$this->output('INNERHTML', [
			'ID'									=> $id,
			'VALUE'									=> $value
		]);
	}
	
	public function hide($id){
		$this->output('HIDE', $id);
	}
	
	public function show($id){
		$this->output('SHOW', $id);
	}
	
	public function error($message){
		$this->output('ERROR', $message);
	}
	
	public function success($message){
		$this->output('SUCCESS', $message);
	}
	
	public function warning($message){
		$this->output('WARNING', $message);
	}
	
	private function output($action, $data){
		$this->actions[]								= [
			'ACTION'									=> $action,
			'CONTENT'									=> $data
		];
	}
	
	public function __destruct(){
		header('application/json');
		echo json_encode($this->actions);
	}
}