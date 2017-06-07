<?php

/**
 * Created by PhpStorm.
 * User: daniel687
 * Date: 5/10/17
 * Time: 4:55 PM
 */
class Authentication
{
    private $apikey =API_KEY;
    private $userkey ="";
    private $authenticated=false;

    public function __construct()
    {
        $this->authenticate();
    }

    private function authenticate()
    {
        foreach (getallheaders() as $name => $value) {
            if ($name == "authorization" || $name == "Authorization") {
                $this->userkey=$value;

                if ($this->userkey == $this->apikey)
                    $this->authenticated = true;
                else
                    $this->authenticated = false;
            }
        }
    }

    public function isauthenticated(){
        return $this->authenticated;
    }

}