<?php

namespace Dancesmile\Youzan\Shop;



use Pimple\Container;
use Pimple\ServiceProviderInterface;


/**
* 
*/
class ShopProvider implements ServiceProviderInterface
{


	public function register(Container $container)
	{

			$container["shop"]  = function (Container $container)
			{
				return new Shop($container);
			};
 
	}
	

}
