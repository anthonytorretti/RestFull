<?php

class PersistentCategory extends PersistentModel{
    public function __construct() {
        parent::__construct();
        $this->_table= 'categories';
        $this->_key='categoryid';
        $this->_return_class='Category';
    }
    

    public function store( $device ) {

        parent::store($device);

        //ANY EXTRA LOGIC GOES HERE
    }


    public function update( & $device ) {


        return parent::update($device);

        //ANY EXTRA LOGIC GOES HERE

    }

    public function load( $categoryid ,$joinarray=false) {


        $res = parent::load($categoryid);

            $category = new Category( $res );

            $pb = new PersistentBrand();

            $brands= $pb->loadAll();

            foreach ($brands as $brand) {

                $pd= new PersistentDevice();
                $devices =$pd->getDevicesByCatAndBrand($category,$brand);

                if(!empty($devices)){
                    $brand->devices=$devices;
                }

            }
            if(!empty($brands)){
                $category->brands=$brands;
                return $category;
            }

    } 
    
    public function loadAll ($joinarray=false) {


        $arrRes = parent::loadAll();

        $categories = array();
        foreach ($arrRes as $res) {
           $category = new Category( $res );

           $pb = new PersistentBrand();
           $allbrands= $pb->loadAll();
           $brands= array();
           foreach ($allbrands as $brand) {

               $pd= new PersistentDevice();
               $devices =$pd->getDevicesByCatAndBrand($category,$brand);

               if(!empty($devices)){
                   $brand->devices=$devices;
                   $brands[] = $brand;
               }

           }
            if(!empty($brands)){
                $category->brands=$brands;
                $categories[] = $category;
            }
        }

        return $categories;
    }
    

    
    
}