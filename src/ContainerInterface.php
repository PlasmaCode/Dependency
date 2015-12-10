<?php
namespace PlasmaCode\Dependency;

interface ContainerInterface
{
    public function resolve($class);
}
