<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pedido Entity.
 */
class Pedido extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'producto_id' => true,
        'fecha_pedido' => true,
        'fecha_pago' => true,
        'cantidad' => true,
        'valor' => true,
        'monto_pagado' => true,
        'fecha_entrega' => true,
        'user' => true,
        'producto' => true,
    ];
}
