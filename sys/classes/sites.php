<?php
class Sites {
	
	public static function toggleEnabled(array $item){
		$item											= DB::getRecord('sites', ['id'=>$item['id']]);
		if($item['active']){
			DB::update(['active'=>0], 'sites', ['id'=>$item['id']]);
			Response::setClass('site_toggle_'.$item['id'], 'good');
			Response::changeInnerHTML('site_toggle_'.$item['id'], 'Enable');
			Response::error('Site with id '.$item['id'].' disabled');
		}else{
			DB::update(['active'=>1], 'sites', ['id'=>$item['id']]);
			Response::setClass('site_toggle_'.$item['id'], 'warning');
			Response::changeInnerHTML('site_toggle_'.$item['id'], 'Disable');
			Response::success('Site with id '.$item['id'].' enabled');
		}
	}
	
	public static function index(array $item){
		new Indexer($item);
		Response::success('Indexing on '.$item['host'].' has completed');
	}
}