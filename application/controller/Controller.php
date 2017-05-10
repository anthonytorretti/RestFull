<?php


class Controller
{

    /**
     * @var null Model
     */
    public $model = null;

    public $Response = null;
    /**
     *
     */
    function __construct()
    {

        $this->loadModel();
        $this->Response = new ResponseApi();
    }


    /**
     * Simple CRUD API Accessible From http://yoursite/{Model}/{id}/{other}
     */


    public function get($params=false){
        $id=$params[0];
        if($params==null){

            $devices=  PersistenceManager::getInstance()->loadAll($this->model);
            $this->Response->send($devices);

        }
        else {
            $device=  PersistenceManager::getInstance()->load($this->model,$id);
            $this->Response->send($device);
        }

    }

    public function post(){
        header('Content-type: application/json');
        echo("Post devices");
    }

    public function put(){
        header('Content-type: application/json');
        echo("PUT devices");
    }
    public function delete(){
        header('Content-type: application/json');
        echo("DELETE devices");
    }


    /**
     * Loads the "defaultmodel".
     * @set object model as String
     */

    public function loadModel()
    {
        $this->model = "";
    }
}
