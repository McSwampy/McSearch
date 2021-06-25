<?php
class Cryp {
	public static function htmlParameter($data){
		return 'HMAC|'.self::encrypt($data);
	}
	
	public static function encrypt($data){
		return openssl_encrypt($data, CRYPT_MODE, CRYPT_PASSWORD, 0, CRYPT_IV);
	}

	public static function decrypt($data){
		return openssl_decrypt($data, CRYPT_MODE, CRYPT_PASSWORD, 0, CRYPT_IV);
	}
	
	
}