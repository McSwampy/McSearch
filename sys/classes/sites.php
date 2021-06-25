<?php
class Sites {
	
	public static function toggleEnabled(array $item){
		$r = new Response();
		$item											= DB::getRecord('sites', ['id'=>$item['id']]);
		if($item['active']){
			DB::update(['active'=>0], 'sites', ['id'=>$item['id']]);
			$r->setClass('site_toggle_'.$item['id'], 'good');
			$r->changeInnerHTML('site_toggle_'.$item['id'], 'Enable');
			$r->error('Site with id '.$item['id'].' disabled');
		}else{
			DB::update(['active'=>1], 'sites', ['id'=>$item['id']]);
			$r->setClass('site_toggle_'.$item['id'], 'warning');
			$r->changeInnerHTML('site_toggle_'.$item['id'], 'Disable');
			$r->success('Site with id '.$item['id'].' enabled');
		}
	}
	
	public static function index(array $item){
		$r = new Response();
		new Indexer($item);
		$r->success('Indexing on '.$item['host'].' has completed');
	}
}