<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HistorialAlumnosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HistorialAlumnosTable Test Case
 */
class HistorialAlumnosTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.historial_alumnos',
        'app.users',
        'app.grados',
        'app.clases',
        'app.convenios_usuarios',
        'app.desvinculaciones',
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
        $config = TableRegistry::exists('HistorialAlumnos') ? [] : ['className' => 'App\Model\Table\HistorialAlumnosTable'];
        $this->HistorialAlumnos = TableRegistry::get('HistorialAlumnos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->HistorialAlumnos);

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
