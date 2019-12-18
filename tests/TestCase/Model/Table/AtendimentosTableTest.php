<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AtendimentosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AtendimentosTable Test Case
 */
class AtendimentosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AtendimentosTable
     */
    public $Atendimentos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Atendimentos',
        'app.Usuarios',
        'app.Cidades',
        'app.TiposAtendimentos',
        'app.Pessoas',
        'app.Orgaos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Atendimentos') ? [] : ['className' => AtendimentosTable::class];
        $this->Atendimentos = TableRegistry::getTableLocator()->get('Atendimentos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Atendimentos);

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
