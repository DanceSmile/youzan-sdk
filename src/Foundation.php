<?php
/**
 * Created by PhpStorm.
 * User: siyue
 * Date: 2018/04/26
 * Time: 15:39
 */

namespace Dancesmile\Youzan;


use Pimple\Container;

class Foundation extends Container
{
    protected $providers = [];

    public function  __construct(array $values = array())
    {
        parent::__construct($values);
        $this->registerProviders();
    }

    protected  function registerProviders()
    {
        foreach ($this->providers as $provider ){
            return $this->register(new $provider);
        }
    }

    /**
     *
     * @param  string $id
     * @return mixed
     */
    public function __get($id){
        return $this->offsetGet($id);
    }

    public function __set($id, $value){
        $this->offsetSet($id,$value);
    }

}