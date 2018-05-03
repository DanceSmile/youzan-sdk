<?php 

namespace Dancesmile\Youzan;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
/**
 * ServiceProvider
 */
class ServiceProvider implements   ServiceProviderInterface
{
    
    public function register(Container $container)
    {

    	$container["access_token"] = function (Container $container)
    	{
 
    		return new AccessToken(

    			$container["config"]["client_id"],
    			$container["config"]["client_secret"],
    			"silent",
    			$container["config"]["kdt_id"],
                $container['cache']

    		);

    	};

    	
    }
}
