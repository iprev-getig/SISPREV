<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CidadeTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CidadeTable Test Case
 */
class CidadeTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CidadeTable
     */
    public $Cidade;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Cidade',
        'app.Estado',
        'app.Coordenadoria',
        'app.Operador',
        'app.Orgao',
        'app.Setor'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Cidade') ? [] : ['className' => CidadeTable::class];
        $this->Cidade = TableRegistry::getTableLocator()->get('Cidade', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Cidade);

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
