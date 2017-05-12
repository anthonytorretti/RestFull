<?php

/**
 * @access public
 * @package Model
 */

class Device extends Model
{

    public $id;
    public $brand;
    public $model;
    public $price;

    public $chipset;
    public $processor;
    public $gpu;
    public $ram;
    public $memory;
    public $hasExpMem;
    public $screenSize;
    public $screenRes;
    public $backCameraRes;
    public $frontCameraRes;
    public $hasFlash = false;
    public $hasAutofocus =false;
    public $backCameraVid;
    public $frontCameraVid;
    public $hasWifi = false;
    public $hasBluetooth = false;
    public $hasGps = false;

    public $reviews = array();


    function addReview(Review $review){
        $this->reviews[]=$review;
    }


}
