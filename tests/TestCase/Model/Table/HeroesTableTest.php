<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HeroesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HeroesTable Test Case
 */
class HeroesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\HeroesTable
     */
    public $Heroes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Heroes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Heroes') ? [] : ['className' => HeroesTable::class];
        $this->Heroes = TableRegistry::getTableLocator()->get('Heroes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Heroes);

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
