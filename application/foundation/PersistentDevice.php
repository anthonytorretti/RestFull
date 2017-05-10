<?php
require APP . 'model/Device.php';
class PersistentDevice extends PersistentModel{
    public function __construct() {
        parent::__construct();
        $this->_table= 'devices';
        $this->_key='id';
        $this->_return_class='Device';
    }
    
    
    public function store( $device ) {

        parent::store($device);
    } 
   
   
    public function update( & $device ) {
        

        return parent::update($device);
    } 
  
    public function load( $key ) {

        $res = parent::load( $key );
        $device = new Device( $res['id'],$res['brand'], $res['model'], $res['price'], $res['details'] );
        return $device;
        
    } 
    
    public function loadAll () {
        
        $params = array();
        $arrRes = $this->search( $params, 'id' );
        $devices = array();
        foreach ($arrRes as $res) {
           $device = new Device( $res['id'], $res['brand'], $res['model'],$res['price'], $res['details'] );
           $devices[] = $device;
        }
        return $devices;
    }
    

    
    
}