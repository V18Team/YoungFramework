<?php
/**
 * This file is part of YoungFramework.
 *
 * (c) YoungFramework 2018
 *
 * If you want, you can see license file at https://github.com/v18team/YoungFramework/LICENSE
 *
 * Date: 05.07.18
 * Time: 13:31
 *
 * @author Mariusz08 < https://github.com/Mariusz08 >
 */

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\EventListener\RouterListener;
use Symfony\Component\HttpKernel\EventListener\ResponseListener;
use Symfony\Component\HttpKernel\EventListener\ExceptionListener;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use YoungFramework\Kernel;
use YoungFramework\ErrorController;

//use YoungFramework\Controller\ErrorController;

//require_once 'YoungFramework/Kernel.php';
require_once 'YoungFramework/Kernel.php';

$containerBuilder = new ContainerBuilder();

$containerBuilder->register('context', RequestContext::class);
$containerBuilder
    ->register('matcher', UrlMatcher::class)
      ->setArguments([$routes, new Reference('context')]);
$containerBuilder->register('controller_resolver', ControllerResolver::class);
$containerBuilder->register('argument_resolver', ArgumentResolver::class);
$containerBuilder->register('stack', RequestStack::class);

$containerBuilder
    ->register('listener.router', RouterListener::class)
        ->setArguments([new Reference('matcher'), new Reference('stack')])
;
$containerBuilder
    ->register('listener.response', ResponseListener::class)
        ->setArguments(['UTF-8'])
;
//$containerBuilder
  //  ->register('listener.exception', ExceptionListener::class)
    //    ->setArguments(['YoungFramework\ErrorController::error'])
//;

$containerBuilder
    ->register('dispatcher', EventDispatcher::class)
        ->addMethodCall('addSubscriber', [new Reference('listener.router')])
        ->addMethodCall('addSubscriber', [new Reference('listener.response')])
        //->addMethodCall('addSubscriber', [new Reference('listener.exception')])
;

$containerBuilder
    ->register('kernel', Kernel::class)
        ->setArguments([
            new Reference('dispatcher'),
            new Reference('controller_resolver'),
            new Reference('stack'),
            new Reference('argument_resolver')
        ]);

return $containerBuilder;
