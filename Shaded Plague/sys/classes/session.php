<?php
class Session {
	public static $record;
	
	public static function init(){
		session_start();
		self::$record								= DB::getRecord('sessions', [
			'key'									=> session_id()
		]);
		if(!self::$record)
			self::createSession();
	}
	
	public static function createSession(){
		self::$record								= [
			'key'									=> session_id(),
			'user'									=> '0'
		];
		self::$record['id']							= DB::insert(self::$record, 'sessions');
	}
}