<?php

/**
 * Created by PhpStorm.
 * User: daniel687
 * Date: 5/12/17
 * Time: 8:53 PM
 */
class Category extends Model
{
    public $categoryid;
    public $categoryname;
    public $brands= array();
}