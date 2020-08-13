<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PedidostypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PedidostypesTable Test Case
 */
class PedidostypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PedidostypesTable
     */
    public $Pedidostypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pedidostypes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Pedidostypes') ? [] : ['className' => PedidostypesTable::class];
        $this->Pedidostypes = TableRegistry::getTableLocator()->get('Pedidostypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Pedidostypes);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
