<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserPerfisTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserPerfisTable Test Case
 */
class UserPerfisTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UserPerfisTable
     */
    public $UserPerfis;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.user_perfis',
        'app.perfis',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('UserPerfis') ? [] : ['className' => UserPerfisTable::class];
        $this->UserPerfis = TableRegistry::getTableLocator()->get('UserPerfis', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserPerfis);

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
