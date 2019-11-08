<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OrgaoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OrgaoTable Test Case
 */
class OrgaoTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OrgaoTable
     */
    public $Orgao;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Orgao',
        'app.Ordem'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Orgao') ? [] : ['className' => OrgaoTable::class];
        $this->Orgao = TableRegistry::getTableLocator()->get('Orgao', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Orgao);

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
