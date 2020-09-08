<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TipocrimesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TipocrimesTable Test Case
 */
class TipocrimesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TipocrimesTable
     */
    public $Tipocrimes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tipocrimes',
        'app.crimes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Tipocrimes') ? [] : ['className' => TipocrimesTable::class];
        $this->Tipocrimes = TableRegistry::getTableLocator()->get('Tipocrimes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Tipocrimes);

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
