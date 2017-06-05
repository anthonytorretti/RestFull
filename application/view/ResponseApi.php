<?php

/**
 * Created by PhpStorm.
 * User: daniel687
 * Date: 5/10/17
 * Time: 12:03 PM
 */
class ResponseApi
{
    public function send($data){
        $json = json_encode($data);
        header('Content-type: application/json');
        header('Access-Control-Allow-Origin','*',false);
        echo($json);
    }

}