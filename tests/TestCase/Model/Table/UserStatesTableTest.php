<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserStatesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserStatesTable Test Case
 */
class UserStatesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UserStatesTable
     */
    public $UserStates;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.user_states',
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
        $config = TableRegistry::getTableLocator()->exists('UserStates') ? [] : ['className' => UserStatesTable::class];
        $this->UserStates = TableRegistry::getTableLocator()->get('UserStates', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserStates);

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
