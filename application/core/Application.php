<?php

/**
 * Created by PhpStorm.
 * User: daniel687
 * Date: 3/12/17
 * Time: 8:53 PM
 */

/**
 * @access public
 * @package Core
 */


class Application
{


    public function __construct()
    {

        if (ENABLE_AUTHENTICATION){
            $auth= new Authentication();

            if($auth->isauthenticated()){
                $router = new Router();
                $router->run();
            }
            else{
                $problem = new Problem();
                $problem->auth();
            }
        }
        else {
            $router = new Router();
            $router->run();
        }



    }

}
