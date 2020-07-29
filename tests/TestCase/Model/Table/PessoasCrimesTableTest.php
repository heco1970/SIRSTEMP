<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PessoasCrimesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PessoasCrimesTable Test Case
 */
class PessoasCrimesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PessoasCrimesTable
     */
    public $PessoasCrimes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pessoas_crimes',
        'app.pessoas',
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
        $config = TableRegistry::getTableLocator()->exists('PessoasCrimes') ? [] : ['className' => PessoasCrimesTable::class];
        $this->PessoasCrimes = TableRegistry::getTableLocator()->get('PessoasCrimes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PessoasCrimes);

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
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
