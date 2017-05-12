<?php

/**
 * @access public
 * @package Core
 */

class Application
{


    public function __construct()
    {
        $auth= new Authentication();

        if($auth->isauthenticated()){
            $router = new Router();
        }
        else{
        $page = new Problem();
        $page->auth();
    }


    }

}
