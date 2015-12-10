<?php
namespace PlasmaCode\Dependency;


use PlasmaCode\Dependency\ContainerInterface;
use \ReflectionClass;

include_once __DIR__ . '/ContainerInterface.php';

class Container implements ContainerInterface
{
    private $config;
    
    public function __construct()
    {
        global $config;
        var_dump($config);
    }
    public function resolve($class)
    {
        $reflection = new ReflectionClass($class);
        $constructor = $reflection->getConstructor();
        
        if(!$constructor) {
            return new $class;
        }
        if(!($params = $constructor->getParameters())) {
            return new $class;
        }
        
        $newParams = array();
        foreach ($params as $param) {
            $newParams[] = self::resolve($param->getClass()->getName());
        }
        
        return $reflection->newInstanceArgs($newParams);
    }
    
}
