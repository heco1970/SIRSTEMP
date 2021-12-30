<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TutelareducativosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TutelareducativosTable Test Case
 */
class TutelareducativosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TutelareducativosTable
     */
    public $Tutelareducativos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tutelareducativos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Tutelareducativos') ? [] : ['className' => TutelareducativosTable::class];
        $this->Tutelareducativos = TableRegistry::getTableLocator()->get('Tutelareducativos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Tutelareducativos);

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
