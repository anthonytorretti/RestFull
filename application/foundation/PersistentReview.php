<?php

class PersistentReview extends PersistentModel{
    public function __construct() {
        parent::__construct();
        $this->_table= 'reviews';
        $this->_key='id';
        $this->_return_class='Review';
    }
    
    
    public function store( $details ) {

        parent::store($details);
    } 
   
   
    public function update( & $device ) {
        

        return parent::update($device);
    } 
  
    public function loadDeviceReviews( $deviceid ) {


        $reviews = array();
        $filters = array(array( 'deviceid','=',$deviceid));
        $res = $this->search( $filters);

        if(!empty($res)) {

            foreach ($res as $elem) {

                $reviews[] = new Review($elem);
            }
        }
        return $reviews;
        
    } 

    

    
    
}