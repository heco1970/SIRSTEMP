<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CentroEducsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CentroEducsTable Test Case
 */
class CentroEducsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CentroEducsTable
     */
    public $CentroEducs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.centro_educs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('CentroEducs') ? [] : ['className' => CentroEducsTable::class];
        $this->CentroEducs = TableRegistry::getTableLocator()->get('CentroEducs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CentroEducs);

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
