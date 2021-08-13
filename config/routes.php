<?php

use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function(RoutingConfigurator $route){
    $route->add('user', '/')
        ->controller([\App\Controller\BlogController::class, 'index'])
        ->methods(['get'])
        ;
};