<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DesvinculacionesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DesvinculacionesTable Test Case
 */
class DesvinculacionesTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.desvinculaciones',
        'app.users',
        'app.grados',
        'app.clases',
        'app.convenios_usuarios',
        'app.historial_alumnos',
        'app.pagos',
        'app.pedidos',
        'app.productos',
        'app.proveedores'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Desvinculaciones') ? [] : ['className' => 'App\Model\Table\DesvinculacionesTable'];
        $this->Desvinculaciones = TableRegistry::get('Desvinculaciones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Desvinculaciones);

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
