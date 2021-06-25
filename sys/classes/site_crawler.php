<?php
class SiteCrawler {
	
	public $content							= '';
	public $plainContent					= '';
	public $contentLength					= 0;
	public $plainContentLength				= 0;
	public $runTime							= 0;
	
	public function __construct(string $url){
		$c									= new Caller($url);
		$urlDetails							= parse_url($url);
		if(empty($urlDetails['scheme'])){
			$urlDetails['scheme']			= 'http';
			$url							= 'http://'.$url;
		}
		if($urlDetails['scheme'] == 'https')
			$c->useProxy					= false;
		$c->retrieveHeaders					= false;
		$this->content						= $c->call();
		$this->runTime						= $c->runTime;
		$this->plainContent					= strip_tags($this->content);
	}
}