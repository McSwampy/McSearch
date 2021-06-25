<?php
class Indexer {
	private $fullURL								= '';
	private $rec									= '';
	private $startTime								= null;
	private $proxy									= [];
	
	public function __construct(array $siteRec){
		$this->startTime							= date('Y-m-d H:i:s');
		if($siteRec['port'] == '80')
			$this->fullURL							= $siteRec['scheme'].'://'.$siteRec['host'].$siteRec['path'];
		else
			$this->fullURL							= $siteRec['scheme'].'://'.$siteRec['host'].':'.$siteRec['port'].$siteRec['path'];
		$this->rec									= $siteRec;
		if($siteRec['use_proxy'] != 0)
			$this->proxy							= DB::getRecord('proxies', ['id'=>$siteRec['use_proxy']]);
		$this->doCall();
	}
	
	private function doCall(){
		$c									= new Caller($this->fullURL);
		if($this->rec['use_proxy'] != 0){
			$c->useProxy					= true;
			$c->proxyIp						= $this->proxy['ip'];
			$c->proxyPort					= $this->proxy['port'];
			if($this->proxy['socks5'] == 1)
				$c->proxySocks5				= true;
		}
		$c->retrieveHeaders					= false;
		$this->content						= $c->call();
		$this->runTime						= $c->runTime;
		$this->plainContent					= strip_tags($this->content);
		DB::update(
			[
				'load_time'					=> $c->runTime,
				'last_ran'					=> $this->startTime
			],'sites',
			['id'=>$this->rec['id']]
		);
		DB::insert([
			'site'							=> $this->rec['id'],
			'content'						=> $this->content
		], 'content');
	}
}