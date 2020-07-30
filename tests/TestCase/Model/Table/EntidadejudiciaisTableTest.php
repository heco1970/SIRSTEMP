<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EntidadejudiciaisTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EntidadejudiciaisTable Test Case
 */
class EntidadejudiciaisTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EntidadejudiciaisTable
     */
    public $Entidadejudiciais;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.entidadejudiciais'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Entidadejudiciais') ? [] : ['className' => EntidadejudiciaisTable::class];
        $this->Entidadejudiciais = TableRegistry::getTableLocator()->get('Entidadejudiciais', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Entidadejudiciais);

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
