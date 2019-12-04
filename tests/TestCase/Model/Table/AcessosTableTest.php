<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AcessosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AcessosTable Test Case
 */
class AcessosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AcessosTable
     */
    public $Acessos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Acessos',
        'app.TiposAcessos',
        'app.Usuarios',
        'app.Sistemas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Acessos') ? [] : ['className' => AcessosTable::class];
        $this->Acessos = TableRegistry::getTableLocator()->get('Acessos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Acessos);

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
