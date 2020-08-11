<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CodigosPostaisTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CodigosPostaisTable Test Case
 */
class CodigosPostaisTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CodigosPostaisTable
     */
    public $CodigosPostais;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.codigos_postais'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('CodigosPostais') ? [] : ['className' => CodigosPostaisTable::class];
        $this->CodigosPostais = TableRegistry::getTableLocator()->get('CodigosPostais', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CodigosPostais);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
