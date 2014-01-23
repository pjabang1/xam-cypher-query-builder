<?php
namespace Xam\Tests\Cypher\QueryBuilder;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
use Xam\Cypher\QueryBuilder\MergeQueryBuilder;

class MergeQueryBuilderTest extends \PHPUnit_Framework_TestCase {
    
    private $queryBuilder;

    /**
     * 
     */
    public function setUp() {
        $this->queryBuilder = new MergeQueryBuilder();
    }
    
    public function testCreateQueryBuilder() {
        $parameters = array(
            'table' => 'Vertical',
            'data' => array(
                'id' => 'animals',
                'name' => 'Animals'
            )
        );
        
        $expect = "MERGE (animals:Vertical {id:'animals', name:'Animals'})\nRETURN animals;\n";
        
        $this->assertEquals($expect, $this->queryBuilder->build($parameters));
    }
    
    
}

?>
