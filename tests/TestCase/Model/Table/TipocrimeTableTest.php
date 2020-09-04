<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TipocrimeTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TipocrimeTable Test Case
 */
class TipocrimeTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TipocrimeTable
     */
    public $Tipocrime;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tipocrime',
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
        $config = TableRegistry::getTableLocator()->exists('Tipocrime') ? [] : ['className' => TipocrimeTable::class];
        $this->Tipocrime = TableRegistry::getTableLocator()->get('Tipocrime', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Tipocrime);

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
