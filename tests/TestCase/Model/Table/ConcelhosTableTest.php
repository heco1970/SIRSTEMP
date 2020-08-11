<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ConcelhosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ConcelhosTable Test Case
 */
class ConcelhosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ConcelhosTable
     */
    public $Concelhos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.concelhos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Concelhos') ? [] : ['className' => ConcelhosTable::class];
        $this->Concelhos = TableRegistry::getTableLocator()->get('Concelhos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Concelhos);

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
