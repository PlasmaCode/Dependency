<?php

include __DIR__ . '/initiate.php';
use PlasmaCode\Dependency\Container;
$container = new Container;

var_dump($container->resolve('ClassB'));

class ClassA {
    
}

class ClassB
{
    public $classA;
    
    public function __construct(ClassA $classA)
    {
        $this->classA = $classA;
    }
}