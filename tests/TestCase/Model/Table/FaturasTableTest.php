<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FaturasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FaturasTable Test Case
 */
class FaturasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FaturasTable
     */
    public $Faturas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.faturas',
        'app.entidadejudiciais',
        'app.units',
        'app.pagamentos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Faturas') ? [] : ['className' => FaturasTable::class];
        $this->Faturas = TableRegistry::getTableLocator()->get('Faturas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Faturas);

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
