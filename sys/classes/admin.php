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
	
	public static function toggleEnableUser(array $item){
		$item											= DB::getRecord('users', ['id'=>$item['id']]);
		if($item['active']){
			DB::update(['active'=>0], 'users', ['id'=>$item['id']]);
			Response::setClass('site_toggle_'.$item['id'], 'good');
			Response::changeInnerHTML('user_toggle_'.$item['id'], 'Enable');
			Response::warning('User account disabled');
		}else{
			DB::update(['active'=>1], 'users', ['id'=>$item['id']]);
			Response::setClass('site_toggle_'.$item['id'], 'warning');
			Response::changeInnerHTML('user_toggle_'.$item['id'], 'Disable');
			Response::success('User account '.$item['name'].' enabled');
		}
	}
}