<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SetoresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SetoresTable Test Case
 */
class SetoresTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SetoresTable
     */
    public $Setores;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Setores',
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
        $config = TableRegistry::getTableLocator()->exists('Setores') ? [] : ['className' => SetoresTable::class];
        $this->Setores = TableRegistry::getTableLocator()->get('Setores', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Setores);

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
