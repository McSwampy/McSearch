<?php
class Template {
	
	public static $Instance;
	
	public static function Init(){
		self::$Instance								= new \Flow\Loader(
			\Flow\Loader::RECOMPILE_ALWAYS,
			new \Flow\Adapter\FileAdapter(TEMPLATE_DIR),
			new \Flow\Adapter\FileAdapter(TEMPLATE_COMPILE_DIR),
			include TEMPLATE_FLOW_HELPER
		);
	}
	
	public static function load(string $name){
		return self::$Instance->load($name)->render(Replace::$replaceArray);
	}
	
	public static function toJS(string $name){
		$r = new Response();
		$r->changeInnerHTML('container', self::load($name));
	}
	
	public static function output($location){
		echo self::load($location);
	}
}