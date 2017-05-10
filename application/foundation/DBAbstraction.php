<?php

class DBAbstraction {
    
    private static $instance = NULL;

    private $dbh;
    private $error;
    private $stmt;

    private function __construct(){
            global $config;
            // Set DSN
            $dsn = $config['dbms']['servertype'] . ':host='. $config['dbms']['host'] . ';dbname='. $config['dbms']['database'];
            // Set Options
            $options = array(
                    PDO::ATTR_PERSISTENT => true,
                    PDO::ATTR_ERRMODE	 => PDO::ERRMODE_EXCEPTION
            );
            // Create new PDO
            try {
                    $this->dbh = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS, $options);
            } catch(PDOEception $e){
                    $this->error = $e->getMessage();
            }
    }

    public static function getInstance() {
        if( is_null( self::$instance ) )
        {
            self::$instance = new DBAbstraction();
        }
        return self::$instance;
    }

    public function query( $query ){
            $this->stmt = $this->dbh->prepare($query);
    }
    

    public function bind($param, $value, $type = null){
            if(is_null($type)){
                    switch(true){
                            case is_int($value):
                                    $type = PDO::PARAM_INT;
                                    break;
                            case is_bool($value):
                                    $type = PDO::PARAM_BOOL;
                                    break;
                            case is_null($value):
                                    $type = PDO::PARAM_NULL;
                                    break;
                                    default:
                                    $type = PDO::PARAM_STR;
                    }
            }
            $this->stmt->bindValue($param, $value, $type);
    }

    public function execute(){
                                 
        try {
            $res = $this->stmt->execute();
            return $res;
        }  catch(PDOException $e) {
            die($e->getMessage());
        }
    }
    
    public function beginTransaction(){
            return $this->dbh->beginTransaction();
    }
    public function commit(){
            return $this->dbh->commit();
    }
    
    public function quote( $s ){
            return $this->dbh->quote( $s );
    }

    public function lastInsertId(){
            $this->dbh->lastInsertId();
    }
    
    public function result(){

        try {
            $this->stmt->execute();
            return $this->stmt->fetch(PDO::FETCH_BOTH);
        }  catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    public function resultset(){

        try {
            $this->stmt->execute();
            return $this->stmt->fetchAll(PDO::FETCH_BOTH);
        }  catch(PDOException $e) {
            die($e->getMessage());
        }
    }
    
//    public function fetchObj( $class ){
//            $this->stmt->setFetchMode( PDO::FETCH_CLASS, $class);
//            return $this->stmt->fetch(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE);
//    }
    
    
}