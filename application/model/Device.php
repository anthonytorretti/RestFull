<?php

/**
 * @access public
 * @package Model
 */

class Device
{
    /**
     * @param object $db A PDO database connection
     */
    public $id;
    public $brand;
    public $model;
    public $price;
    public $detalis;

    /**
     * @access public
     */
    function __construct($id,$brand,$model,$price,$details)
    {
        $this->id=$id;
        $this->brand=$brand;
        $this->model=$model;
        $this->price=$price;
        $this->detalis=$details;
    }


}
