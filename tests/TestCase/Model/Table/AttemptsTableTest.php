<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AttemptsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AttemptsTable Test Case
 */
class AttemptsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AttemptsTable
     */
    public $Attempts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.attempts'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Attempts') ? [] : ['className' => AttemptsTable::class];
        $this->Attempts = TableRegistry::getTableLocator()->get('Attempts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Attempts);

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
