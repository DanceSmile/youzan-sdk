<?php 

namespace Dancesmile\Youzan;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Dancesmile\Youzan\Api;
/**
 * ServiceProvider
 */
class ServiceProvider implements   ServiceProviderInterface
{
    
    public function register(Container $container)
    {

    	$container["accessToken"] = function (Container $container)
    	{
    		return new AccessToken(
    			$container["config"]["client_id"],
    			$container["config"]["client_secret"],
    			$container["config"]["kdt_id"]
    		);
    	};

        $container["accessToken"] ->setType ($container['config']->get("type") );

        $container["api"]  = new Api($container['accessToken']);
    	
    }
}
