<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TiposAcessosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TiposAcessosTable Test Case
 */
class TiposAcessosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TiposAcessosTable
     */
    public $TiposAcessos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.TiposAcessos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TiposAcessos') ? [] : ['className' => TiposAcessosTable::class];
        $this->TiposAcessos = TableRegistry::getTableLocator()->get('TiposAcessos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TiposAcessos);

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
