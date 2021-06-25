<?php
$definesArray							= [
	'TEMPLATE_DIR'						=> ROOT.'/templates',
	'TEMPLATE_COMPILE_DIR'				=> ROOT.'/compiled',
	'TEMPLATE_FLOW_HELPER'				=> ROOT.'/sys/flow_helpers/flow_helper.php',
	
	'CRYPT_IV'							=> 1252145412569889,
	'CRYPT_PASSWORD'					=> 'G8k33p3r@G8',
	'CRYPT_MODE'						=> 'aes-256-cbc-hmac-sha256',
];
foreach($definesArray as $k=>$v){
	define($k, $v);
}