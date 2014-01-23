<?php

namespace Xam\Cypher\QueryBuilder;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

abstract class AbstractQueryBuilder {

    /**
     * 
     */
    abstract public function build($parameters); 

    /**
     * 
     * @param type $table
     * @param type $data
     * @return type
     */
    public function getLabel($table, $data) {
        return $data['id'] . ':' . $table;
    }

    /**
     * 
     * @param type $table
     * @param type $data
     * @return type
     */
    public function getData($data) {
        if (!isset($data['id'])) {
            $data['id'] = uniqid();
        }
        return $data;
    }
    
    /**
     * 
     * @param type $data
     * @return string
     */
    public function jsonEncode($data) {
        $return = '{';
        if($data) {
            foreach($data AS $key => $value) {
                if(is_array($value)) {
                    
                } else {
                    if($return != '{') {
                        $return .= ', ';
                    }
                   
                     $return .= $key . ':' . '\'' . $value . '\'';
                            
                }
            }
        }
        $return .= '}';
        return $return;
    }

}

?>
