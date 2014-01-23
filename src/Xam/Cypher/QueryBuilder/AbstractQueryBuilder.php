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

}

?>
