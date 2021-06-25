<?php
$classes = scandir(ROOT.'/sys/classes');
foreach($classes as $item){
	if(!in_array($item, ['.', '..'])){
		require_once ROOT.'/sys/classes/'.$item;
	}
}
Request::get();
Session::init();
User::init();