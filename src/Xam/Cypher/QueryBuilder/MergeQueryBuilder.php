<?php

namespace Xam\Cypher\QueryBuilder;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class MergeQueryBuilder extends AbstractQueryBuilder {

    /**
     * 
     * @param array $parameters
     * @return string CREATE (me:American {name: "Emil"}) RETURN me;
     */
    public function build($parameters) {
        
        $parameters['timestamp'] = isset($parameters['timestamp']) ? $parameters['timestamp'] : true;
         
        
        $table = $parameters['table'];
        $data = $this->getData($parameters['data']);

        
        $label = $this->getLabel($table, $data);
        $line = $this->jsonEncode($data);
        
        $query = 'MERGE (' . $label . ' ' . $line . ')' . "\n";
        
        if($parameters['timestamp'] === true) {
            // $query .= "ON CREATE {$data['id']} SET {$data['id']}._created = timestamp() \n";
            // $query .= "ON MATCH {$data['id']} SET {$data['id']}._lastSeen = timestamp( )\n";
        }
        
        
        $query .= "RETURN {$data['id']};\n";
        echo $query;
        
        return $query;
    }
    
   

}

?>
