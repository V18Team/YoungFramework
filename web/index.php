<?php
/**
 * This file is part of YoungFramework.
 *
 * (c) YoungFramework 2018
 *
 * If you want, you can see license file at https://github.com/v18team/YoungFramework/LICENSE
 *
 * Date: 05.07.18
 * Time: 13:29
 *
 * @author Mariusz08 < https://github.com/Mariusz08 >
 */

require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;

$routes = require_once __DIR__ . '/../src/routes.php';
$container = require_once __DIR__ . '/../src/containerBuilder.php';

$request = Request::createFromGlobals();

$response = $container->get('kernel')->handle($request);
