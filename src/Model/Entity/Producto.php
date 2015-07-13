<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Producto Entity.
 */
class Producto extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'nombre' => true,
        'descripcion' => true,
        'precio' => true,
        'proveedor_id' => true,
        'estado' => true,
        'imagen' => true,
        'proveedore' => true,
        'pedidos' => true,
    ];
}
