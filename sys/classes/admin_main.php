<?php
class AdminMain {
	public function __construct(){
		
	}
	
	public static function getSites(){
		$sites = DB::getRecords('sites');
		Replace::add('SITES', $sites);
		Replace::add('SITES_COUNT', count($sites));
		Template::output('main/home.html');
	}
}