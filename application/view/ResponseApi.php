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
        echo($json);
    }

}