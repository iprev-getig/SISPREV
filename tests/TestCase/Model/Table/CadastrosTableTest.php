<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CadastrosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CadastrosTable Test Case
 */
class CadastrosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CadastrosTable
     */
    public $Cadastros;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Cadastros'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Cadastros') ? [] : ['className' => CadastrosTable::class];
        $this->Cadastros = TableRegistry::getTableLocator()->get('Cadastros', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Cadastros);

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
