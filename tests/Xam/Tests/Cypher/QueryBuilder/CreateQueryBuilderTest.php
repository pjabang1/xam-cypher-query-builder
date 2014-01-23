<?php
namespace Xam\Tests\Cypher\QueryBuilder;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
use Xam\Cypher\QueryBuilder\CreateQueryBuilder;

class CreateQueryBuilderTest extends \PHPUnit_Framework_TestCase {
    
    private $queryBuilder;

    /**
     * 
     */
    public function setUp() {
        $this->queryBuilder = new CreateQueryBuilder();
    }
    
    public function testCreateQueryBuilder() {
        $parameters = array(
            'table' => 'Vertical',
            'data' => array(
                'id' => 'animals',
                'name' => 'Animals'
            )
        );
        
        $expect = '';
        
        $this->assertEquals($expect, $this->queryBuilder->build($parameters));
    }
    
    
}

?>
