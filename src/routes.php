<?php
/**
 * This file is part of YoungFramework.
 *
 * (c) YoungFramework 2018
 *
 * If you want, you can see license file at https://github.com/v18team/YoungFramework/LICENSE
 *
 * Date: 05.07.18
 * Time: 14:08
 *
 * @author Mariusz08 < https://github.com/Mariusz08 >
 */

require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

class LController{public function index(){return new \Symfony\Component\HttpFoundation\JsonResponse('asdasd');}}

$routes = new RouteCollection();

$routes->add('hello', new Route('/hello/'), ['_controller' => function(){return new JsonResponse('ok');}]);

return $routes;
