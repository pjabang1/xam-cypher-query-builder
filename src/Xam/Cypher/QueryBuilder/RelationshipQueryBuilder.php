<?php

namespace Xam\Cypher\QueryBuilder;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class RelationshipQueryBuilder extends AbstractQueryBuilder {

    /**
     * 
     * @param array $parameters
     * @return string CREATE (me:American {name: "Emil"}) RETURN me;
     */
    public function build($parameters) {
        
        $parameters['replace'] = isset($parameters['replace']) ? $parameters['replace'] : false;
        $parameters['timestamp'] = isset($parameters['timestamp']) ? $parameters['timestamp'] : true;
        
        $type = ($parameters['replace'] === true) ? 'MERGE' : 'CREATE'; 
        
        $table = $parameters['table'];
        $data = $this->getData($parameters['data']);

        
        $label = $this->getLabel($table, $data);
        $line = $this->jsonEncode($data);
        
        $query = '\'' . $type . '(' . $label . ' ' . $line . ')' . "\n";
        
        if($parameters['timestamp'] === true) {
            $query .= "ON CREATE {$data['id']} SET keanu._created = timestamp()\n";
            $query .= "ON MATCH {$data['id']} SET keanu._lastSeen = timestamp()\n";
        }
        $query .= "RETURN {$data['id']};\n";
    }
    
   

}

?>
