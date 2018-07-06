<?php
/**
 * This file is part of YoungFramework.
 *
 * (c) YoungFramework 2018
 *
 * If you want, you can see license file at https://github.com/v18team/YoungFramework/LICENSE
 *
 * Date: 06.07.18
 * Time: 10:45
 *
 * @author Mariusz08 < https://github.com/Mariusz08 >
 */

namespace YoungFramework;

use Symfony\Component\HttpFoundation\Response;

class ErrorController
{
    public function error()
    {
        return new Response('<h1>ERROR</h1>');
    }
}
