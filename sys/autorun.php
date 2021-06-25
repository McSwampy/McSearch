<?php
$classes = scandir(ROOT.'/sys/classes');
require_once 'defines.php';
require_once ROOT.'/sys/composer/vendor/autoload.php';
foreach($classes as $item){
	if(!in_array($item, ['.', '..'])){
		require_once ROOT.'/sys/classes/'.$item;
	}
}
Request::get();
Template::Init();