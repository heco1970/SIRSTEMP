<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DistritosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DistritosTable Test Case
 */
class DistritosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DistritosTable
     */
    public $Distritos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.distritos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Distritos') ? [] : ['className' => DistritosTable::class];
        $this->Distritos = TableRegistry::getTableLocator()->get('Distritos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Distritos);

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
