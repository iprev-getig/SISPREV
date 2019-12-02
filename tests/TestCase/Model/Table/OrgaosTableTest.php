<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OrgaosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OrgaosTable Test Case
 */
class OrgaosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OrgaosTable
     */
    public $Orgaos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::getTableLocator()->exists('Orgaos') ? [] : ['className' => OrgaosTable::class];
        $this->Orgaos = TableRegistry::getTableLocator()->get('Orgaos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Orgaos);

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
