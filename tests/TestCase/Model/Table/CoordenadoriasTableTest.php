<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CoordenadoriasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CoordenadoriasTable Test Case
 */
class CoordenadoriasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CoordenadoriasTable
     */
    public $Coordenadorias;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Coordenadorias',
        'app.Usuarios',
        'app.Cidades'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Coordenadorias') ? [] : ['className' => CoordenadoriasTable::class];
        $this->Coordenadorias = TableRegistry::getTableLocator()->get('Coordenadorias', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Coordenadorias);

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
