<?php

class PersistentDevice extends PersistentModel{
    public function __construct() {
        parent::__construct();
        $this->_table= 'devices';
        $this->_key='id';
        $this->_return_class='Device';
    }
    

    public function store( $device ) {


        parent::store($device);

        //ANY EXTRA LOGIC GOES HERE
    }


    public function update( & $device ) {


        return parent::update($device);

        //ANY EXTRA LOGIC GOES HERE

    }

    public function load( $deviceid ,$join=false) {


        $joinarray=array(array("categories","categoryid"),array("brands","brandid"));

        $res = parent::load($deviceid,$joinarray);

        $device = new Device( $res );

        $pr = new PersistentReview();
        $reviews=$pr->loadDeviceReviews($deviceid);

        if(!empty($reviews)) {

            foreach ($reviews as $rev) {
                $device->addReview($rev);
            }
        }

        return $device;
        
    } 


    public function loadAll ($joinarray=false) {


        $joinarray=array(array("categories","categoryid"),array("brands","brandid"));

        $arrRes = parent::loadAll($joinarray);

        $devices = array();
        foreach ($arrRes as $res) {
           $device = new Device( $res );
           $devices[] = $device;
        }
        return $devices;
    }

    public function getDevicesByCatAndBrand(Category $category,Brand $brand){
        $filters=array(array("categoryid","=",$category->categoryid),array("brandid","=",$brand->brandid));
        $res=$this->search($filters);
        $devices=array();
        foreach ($res as $resdevice){
            $device= new Device($resdevice);
            $device->brandname=$brand->brandname;
            $device->categoryname=$category->categoryname;
            $devices[]=$device;

        }

        return $devices;
    }
    

    
    
}