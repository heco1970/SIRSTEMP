<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EstbPrisTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EstbPrisTable Test Case
 */
class EstbPrisTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EstbPrisTable
     */
    public $EstbPris;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.estb_pris'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('EstbPris') ? [] : ['className' => EstbPrisTable::class];
        $this->EstbPris = TableRegistry::getTableLocator()->get('EstbPris', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EstbPris);

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
