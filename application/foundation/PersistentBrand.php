<?php

class PersistentBrand extends PersistentModel{
    public function __construct() {
        parent::__construct();
        $this->_table= 'brands';
        $this->_key='brandid';
        $this->_return_class='Brand';
    }
    

    public function store( $device ) {

        parent::store($device);

        //ANY EXTRA LOGIC GOES HERE
    }


    public function update( & $device ) {


        return parent::update($device);

        //ANY EXTRA LOGIC GOES HERE

    }

    public function load( $brandid,$join=false ) {

        $res = parent::load($brandid);

        return $res;

    }

    public function loadAll ($join=false) {


        $arrRes = parent::loadAll();

        $brands=array();
        foreach ($arrRes as $res) {
           $brand=  new Brand( $res );
           $brands[] = $brand;
        }
        return $brands;
    }





    

    
    
}