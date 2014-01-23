<?php

namespace Xam\Cypher\QueryBuilder;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class CreateQueryBuilder extends AbstractQueryBuilder {

    /**
     * 
     * @param array $parameters
     * @return string CREATE (me:American {name: "Emil"}) RETURN me;
     */
    public function build($parameters) {
        $table = $parameters['table'];
        $data = $this->getData($parameters['data']);
        
        $label = $this->getLabel($table, $data);
        $line = json_encode($data);
        return 'CREATE (' . $label . ' ' . $line . ');';
    }
    
   

}

?>
