<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * HistorialAlumno Entity.
 */
class HistorialAlumno extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'fecha' => true,
        'tipo' => true,
        'descripcion' => true,
        'logro' => true,
        'user' => true,
    ];
}
