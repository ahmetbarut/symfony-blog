<?php

use App\Controller\TestController;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function(RoutingConfigurator $route){
    $route->add('home', '/')
    ->controller([TestController::class, 'index'])
    ->methods(['get'])

    
    
    ;
};