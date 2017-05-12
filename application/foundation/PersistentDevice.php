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

    public function load( $deviceid ) {

        $res = parent::load( $deviceid );

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
    
    public function loadAll () {


        $arrRes = parent::loadAll();

        $devices = array();
        foreach ($arrRes as $res) {
           $device = new Device( $res );
           $devices[] = $device;
        }
        return $devices;
    }
    

    
    
}