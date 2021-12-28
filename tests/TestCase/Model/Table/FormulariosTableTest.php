<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FormulariosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FormulariosTable Test Case
 */
class FormulariosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FormulariosTable
     */
    public $Formularios;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.formularios'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Formularios') ? [] : ['className' => FormulariosTable::class];
        $this->Formularios = TableRegistry::getTableLocator()->get('Formularios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Formularios);

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
