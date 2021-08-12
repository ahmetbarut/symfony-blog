<?php

use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function(RoutingConfigurator $route){
    $route->add('home', '/{page}')
        ->controller([\App\Controller\BlogController::class, 'index'])
        ->methods(['get']);
};