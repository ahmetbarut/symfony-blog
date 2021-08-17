<?php

use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function(RoutingConfigurator $route){
    $route->add('home', '/')
        ->controller([\App\Controller\BlogController::class, 'index'])
        ->methods(['get']);

    $route->add('blog.create', '/blog/create')
        ->controller([\App\Controller\BlogController::class, 'create'])
        ->methods(['GET', "HEAD"]);
        
    $route->add('blog.store', '/blog/store')
        ->controller([\App\Controller\BlogController::class, 'store'])
        ->methods(['post']);

    $route->add('blog.show', '/show/{slug}')
        ->controller([\App\Controller\BlogController::class, 'show'])
        ->methods(['get']);


};