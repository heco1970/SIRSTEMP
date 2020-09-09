<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CrimesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CrimesTable Test Case
 */
class CrimesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CrimesTable
     */
    public $Crimes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.crimes',
        'app.processos',
        'app.tipocrimes',
        'app.pessoas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Crimes') ? [] : ['className' => CrimesTable::class];
        $this->Crimes = TableRegistry::getTableLocator()->get('Crimes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Crimes);

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
