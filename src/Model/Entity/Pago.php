<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pago Entity.
 */
class Pago extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'mes' => true,
        'monto' => true,
        'año' => true,
        'observacion' => true,
        'fecha_pago' => true,
        'forma_pago' => true,
        'user' => true,
        'mes_pago'=>true,
        'año_pago'=>true
    ];

    protected function _getMes($mes){
        $months = [
            -1=>'',
            'Enero',
            'Febrero',
            'Marzo',
            'Abril',
            'Mayo',
            'Junio',
            'Julio',
            'Agosto',
            'Septiembre',
            'Octubre',
            'Noviembre',
            'Diciembre'
        ];
        return $months[$mes-1];
    }
}
