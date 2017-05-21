<?php
/**
 * @access public
 * @package Foundation
 */
class PersistentModel {
    /**
     * @var $_connection Variabile di connessione al database
     */
    private $_dba;
    /**
     * @var $_result Variabile contenente il risultato dell'ultima query
     */
    private $_result;
    /**
     * @var $_table Variabile contenente il nome della tabella
     */
    protected $_table;
    /**
     * @var $_key Variabile contenente la chiave della tabella
     */
    protected $_key;
    /**
     * @var $_return_class Variabile contenente il tipo di classe da restituire
     */
    protected $_return_class;
    /**
     * @var $_auto_increment Variabile booleana tabella con chiave automatica o no
     */
    protected $_auto_increment=false;
    /**
     *
     * @global array $config
     */
    public function __construct() {
        
        $this->dba = DBAbstraction::getInstance();
    }

    
    public function store( $object ) {
        $properties = get_object_vars( $object );
        $table = $this->_table;
        foreach ($properties as $key => $value) {
            if (is_object($value)) {
                if (get_class($value) == "DateTime") {
                    $value = $value->format('Y-m-d H:i:s');
                }
            }        
            $cols[] = $key; 
            $values[] = $this->dba->quote($value);
        }
        
        $q = 'INSERT INTO ' . $table . ' (' . implode(", ", $cols) . ') VALUES (' .implode(", ", $values).')';

        if ( !$this->_auto_increment  ) {

            $this->dba->query( $q );
            return $this->dba->execute();

        } else {

            try {  
                $this->dba->beginTransaction();
                    $this->dba->query( $q );
                    $this->dba->execute();
                    $this->dba->query( "SELECT LAST_INSERT_ID()" );
                    $id_as_array = $this->dba->result();
                $this->dba->commit();
                return (int) $id_as_array[0];        
            } catch (Exception $e) {
                $this->dba->rollback();
                print "Failure: " . $e->getMessage();
            }

        }
    } 
    
    public function load( $key,$joinarr=false ) {
        $query='SELECT * ' .
            'FROM '.$this->_table.' ';

        if(!empty($joinarr)) {
            foreach ($joinarr as $join) {
                $query .= ' INNER JOIN ' . $join[0] . ' ON ' . $join[0] . "." . $join[1] . "=" . $this->_table . "." . $join[1];
            }
        }
        $query .=' WHERE '.$this->_key.'='.$key;

        $this->dba->query($query);
        return $this->dba->result( );
    }

    public function loadAll($joinarr=false) {
        $query='SELECT * ' .
            'FROM '.$this->_table.' ';

        if(!empty($joinarr)) {
            foreach ($joinarr as $join) {
                $query .= ' INNER JOIN ' . $join[0] . ' ON ' .  $join[0] . "." . $join[1] .'=' . $this->_table . "." . $join[1];
            }
        }

        $this->dba->query($query);
        return $this->dba->resultset( );
    }



    public function delete(& $object) {
        $arrayObject=get_object_vars($object);
        $query='DELETE ' .
                'FROM '.$this->_table.' ' .
                'WHERE '.$this->_key.' = \''.$arrayObject[$this->_key].'\'';
        unset($object);
        $this->dba->query($query);
        return $this->dba->execute();
    }

    public function update(& $object) {
        $properties = get_object_vars( $object );
        $table = $this->_table;
        foreach ($properties as $key => $value) {
            if (is_object($value)) {
                if (get_class($value) == "DateTime") {
                    $value = $value->format('Y-m-d H:i:s');
                }
            }        
            $fields[] = $key . "=" . $this->dba->quote($value); 
        }

        $query='UPDATE '.$this->_table.' SET '.implode(", ", $fields).' WHERE '.$this->_key.' = \''.$properties[$this->_key].'\'';
        $this->dba->query( $query );
        return $this->dba->execute();
    }

    function search($parametri = array(), $ordinamento = '', $limit = '') {
        $filtro='';
        for ($i=0; $i<count($parametri); $i++) 
        {
            if ($i>0) $filtro .= ' AND';
            $filtro .= ' '.$parametri[$i][0].' '.$parametri[$i][1].' \''.$parametri[$i][2].'\'';
        }
        $query='SELECT * ' .
                'FROM '.$this->_table.' ';
        if ($filtro != '')
            $query.='WHERE '.$filtro.' ';
        if ($ordinamento!='')
            $query.='ORDER BY '.$ordinamento.' ';
        if ($limit != '')
            $query.='LIMIT '.$limit.' ';
// print $query;       
        $this->dba->query($query);
        return $this->dba->resultset( ); 
    }
}

?>


