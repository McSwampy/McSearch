<?php
class Admin {
	public static function sites(){
		$extra									= '';
		if(!empty(Request::$URI['SEARCH'])){
			$extra								= ' WHERE host LIKE \'%'.Request::$URI['SEARCH'].'%\'';
			Replace::add('SEARCH', Request::$URI['SEARCH']);
		}
		$sites									= DB::getSQL('
			SELECT
				*
			FROM
				sites'.$extra);
		Replace::add('SITES', $sites);
		Template::toJS('admin/sites.html');
	}
	
	public static function stats(){
		$sites = DB::getRecords('sites');
		Replace::add('TOTAL_SITES', count($sites));
		Template::toJS('admin/stats.html');
	}
	
	public static function home(){
		Template::output('admin/home.html');
	}
}