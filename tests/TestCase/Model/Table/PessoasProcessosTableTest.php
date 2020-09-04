<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PessoasProcessosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PessoasProcessosTable Test Case
 */
class PessoasProcessosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PessoasProcessosTable
     */
    public $PessoasProcessos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pessoas_processos',
        'app.pessoas',
        'app.processos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PessoasProcessos') ? [] : ['className' => PessoasProcessosTable::class];
        $this->PessoasProcessos = TableRegistry::getTableLocator()->get('PessoasProcessos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PessoasProcessos);

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
