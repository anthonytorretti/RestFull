<?php

/**
 * Created by PhpStorm.
 * User: daniel687
 * Date: 5/12/17
 * Time: 12:27 PM
 */
class Model
{

    protected $fillable;
    function __construct($data)
    {
        foreach ($data as $key => $value){
            $this->{$key} = $value;
        }

    }

   public  function get_fillable(){
        return $this->fillable;
    }


}