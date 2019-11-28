<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EstadoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EstadoTable Test Case
 */
class EstadoTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EstadoTable
     */
    public $Estado;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Estado',
        'app.Cidade'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Estado') ? [] : ['className' => EstadoTable::class];
        $this->Estado = TableRegistry::getTableLocator()->get('Estado', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Estado);

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
     * Test searchConfiguration method
     *
     * @return void
     */
    public function testSearchConfiguration()
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
