<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UnidadeoperasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UnidadeoperasTable Test Case
 */
class UnidadeoperasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UnidadeoperasTable
     */
    public $Unidadeoperas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.unidadeoperas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Unidadeoperas') ? [] : ['className' => UnidadeoperasTable::class];
        $this->Unidadeoperas = TableRegistry::getTableLocator()->get('Unidadeoperas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Unidadeoperas);

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
