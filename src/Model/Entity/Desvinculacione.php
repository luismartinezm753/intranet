<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Desvinculacione Entity.
 */
class Desvinculacione extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'fecha_egreso' => true,
        'motivo' => true,
        'descripcion' => true,
        'monto_deuda' => true,
        'observaciones' => true,
        'user' => true,
    ];
}
