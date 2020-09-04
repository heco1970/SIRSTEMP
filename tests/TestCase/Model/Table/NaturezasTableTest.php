<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NaturezasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NaturezasTable Test Case
 */
class NaturezasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NaturezasTable
     */
    public $Naturezas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.naturezas',
        'app.processos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Naturezas') ? [] : ['className' => NaturezasTable::class];
        $this->Naturezas = TableRegistry::getTableLocator()->get('Naturezas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Naturezas);

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
