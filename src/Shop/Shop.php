<?php 
namespace Dancesmile\Youzan\Shop;
class Shop{



	public $config;

		public function __construct($config)
		{
			$this->config =  $config;
		}
		public function index()
		{
			$this->config->cache->save("test","shop index");
			die();
		}

		public function addShop()
		{
			$concole = $this->config->cache->fetch("test");
			dd($concole);
		}


}