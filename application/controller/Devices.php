<?php

/**
 * Class devices
 * This is a demo class.
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */


class devices extends Controller
{

   /**
    * Extend Parent Constructor to set Model of Controller
    */

    function __construct()
    {
        parent::__construct();
        $this->model="Device";
    }

    public function post()
    {
        if (isset($_POST)) {
            $data = $_POST;
            $device = new Device($data);
echo(json_encode($device));
            PersistenceManager::getInstance()->store($device);
        }
        parent::post();
    }

    /**
     * EXTRA NON CRUD OPERATIONS GO HERE
     */



}
