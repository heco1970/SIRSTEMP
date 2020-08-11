<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PessoasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PessoasTable Test Case
 */
class PessoasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PessoasTable
     */
    public $Pessoas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pessoas',
        'app.pais',
        'app.centro_educs',
        'app.estb_pris',
        'app.estadocivils',
        'app.generos',
        'app.unidadeoperas',
        'app.contactos',
        'app.pedidos',
        'app.verbetes',
        'app.crimes',
        'app.pessoas_crimes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Pessoas') ? [] : ['className' => PessoasTable::class];
        $this->Pessoas = TableRegistry::getTableLocator()->get('Pessoas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Pessoas);

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
