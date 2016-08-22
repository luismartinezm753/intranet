<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Grado Entity.
 */
class Grado extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'grado' => true,
        'programa' => true,
        'duracion_mes' => true,
        'users' => true,
    ];
    
}
