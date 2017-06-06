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


class reviews extends Controller
{

   /**
    * Extend Parent Constructor to set Model of Controller
    */

    function __construct()
    {
        parent::__construct();
        $this->model="Review";
    }

    /**
     * EXTRA NON CRUD OPERATIONS GO HERE
     */



}
