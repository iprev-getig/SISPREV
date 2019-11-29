<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TiposAtendimentosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TiposAtendimentosTable Test Case
 */
class TiposAtendimentosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TiposAtendimentosTable
     */
    public $TiposAtendimentos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.TiposAtendimentos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TiposAtendimentos') ? [] : ['className' => TiposAtendimentosTable::class];
        $this->TiposAtendimentos = TableRegistry::getTableLocator()->get('TiposAtendimentos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TiposAtendimentos);

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
