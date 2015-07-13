<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Proveedore Entity.
 */
class Proveedore extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'nombre' => true,
        'email' => true,
        'telefono' => true,
        'direccion' => true,
        'pagina_web' => true,
        'ciudad' => true,
    ];
}
