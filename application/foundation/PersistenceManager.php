<?php
/**
 * @access public
 * @package Foundation
 */
class PersistenceManager {

    private static $instance = NULL;
    
    private $persistentDevice = NULL;
    private $persistentCategory = NULL;

    private function __construct(){
        
        $this->persistentDevice = new PersistentDevice();
        $this->persistentCategory = new PersistentCategory();

    }
    
    public static function getInstance() {
        if( is_null( self::$instance ) )
        {
            self::$instance = new PersistenceManager();
        }
        return self::$instance;
    }
    
    public function store (& $object ){
        
        if (is_object( $object )){
            $persistentString = "persistent" .  get_class($object);
            $persistentClass = $this->{$persistentString} ;
            if ( is_object( $persistentClass ) ) {
                
                $persistentClass->store( $object );
            }
        }
    }
    
    public function load ( $className, $key ){
        
        $persistentString = "persistent" .  $className;
        $persistentClass = $this->{$persistentString} ;
        if ( is_object( $persistentClass ) ) {
            
            return $persistentClass->load( $key );
        }  
    }

    public function loadall($className){

        $persistentString = "persistent" .  $className;
        $persistentClass = $this->{$persistentString} ;
        if ( is_object( $persistentClass ) ) {

            return $persistentClass->loadAll();
        }

    }
    
    public function delete ( & $object ){         
        
        if (is_object( $object )){
            $persistentString = "persistent" .  get_class($object);
            $persistentClass = $this->{$persistentString} ;
            if ( is_object( $persistentClass ) ) {
                
                return $persistentClass->delete( $object );
            }
        }                                
    }
    
    public function update ( & $object  ){
        
        if (is_object( $object )){
            $persistentString = "persistent" .  get_class($object);
            $persistentClass = $this->{$persistentString} ;
            if ( is_object( $persistentClass ) ) {
                
                return $persistentClass->update( $object );
            }
        }
    }


    
    
//    public function lazyLoadUser ( $_userid ) {
//
//        if ( $_userid == 'all' ) {
//            return $this->persistentUser->lazyLoadAll();
//        } else {
//            return $this->persistentUser->lazyLoad( $_userid );
//        }
//    }
//
//    public function userLogin ( $_userid, $_pwd ) {
//
//        return $this->persistentUser->login( $_userid, $_pwd );
//    }
//
//
//
//
}

