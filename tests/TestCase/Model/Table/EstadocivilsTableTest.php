<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EstadocivilsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EstadocivilsTable Test Case
 */
class EstadocivilsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EstadocivilsTable
     */
    public $Estadocivils;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.estadocivils'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Estadocivils') ? [] : ['className' => EstadocivilsTable::class];
        $this->Estadocivils = TableRegistry::getTableLocator()->get('Estadocivils', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Estadocivils);

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
