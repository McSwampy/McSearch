<?php
class Caller {
	public $proxyIp							= '';
	public $proxyPort						= '';
	public $proxySocks5						= false;
	public $useProxy						= false;
	public $url								= '';
	public $retrieveHeaders					= false;
	public $runTime							= 0;
	private $curl							= null;
	
	public function __construct(string $url){
		$this->url							= $url;
	}
	
	public function call(){
		
		$start								= $this->getTimeStamp();
		$this->curl							= curl_init();
		curl_setopt($this->curl, CURLOPT_URL,$this->url);
		if($this->useProxy){
			curl_setopt($this->curl, CURLOPT_PROXY, $this->proxyIp.':'.$this->proxyPort);
			if($this->proxySocks5){
				curl_setopt($this->curl, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5_HOSTNAME);
				curl_setopt($this->curl, CURLOPT_HTTPPROXYTUNNEL, 1);
			}
		}
		curl_setopt($this->curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($this->curl, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($this->curl, CURLOPT_HEADER, ($this->retrieveHeaders == true) ? 1 : 0);
		$curl_scraped_page = curl_exec($this->curl);
		curl_close($this->curl);
		$end								= $this->getTimeStamp();
		$this->runTime						= round(($end - $start), 3);
		return $curl_scraped_page;
	}
	
	private function getTimeStamp(){
		$startTime							= microtime();
		$exo								= explode(' ', $startTime);
		return $exo[1] + $exo[0];
	}
}