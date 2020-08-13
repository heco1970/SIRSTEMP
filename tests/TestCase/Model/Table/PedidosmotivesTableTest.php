<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PedidosmotivesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PedidosmotivesTable Test Case
 */
class PedidosmotivesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PedidosmotivesTable
     */
    public $Pedidosmotives;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pedidosmotives'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Pedidosmotives') ? [] : ['className' => PedidosmotivesTable::class];
        $this->Pedidosmotives = TableRegistry::getTableLocator()->get('Pedidosmotives', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Pedidosmotives);

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
