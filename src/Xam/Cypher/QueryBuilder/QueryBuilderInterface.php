<?php

namespace Xam\Cypher\QueryBuilder;

/*
 * QueryBuilderInterface
 * 
 */

interface QueryBuilderInterface extends AbstractQ {

    /**
     * 
     * @param string $table
     * @param array $data
     */
    public function build($table, $data);
}

?>
