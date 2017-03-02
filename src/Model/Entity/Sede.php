<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sede Entity
 *
 * @property int $id
 * @property string $nombre
 * @property string $direccion
 * @property string $telefono
 * @property string $comuna
 * @property string $ciudad
 * @property \Cake\I18n\Time $fecha_inicio
 * @property int $monto_arriendo
 * @property string $nombre_arrendador
 * @property string $mail_arrendador
 * @property string $telefono_arrendador
 * @property string $logo
 * @property int $escuela_id
 * @property int $director_id
 *
 * @property \App\Model\Entity\Escuela $escuela
 * @property \App\Model\Entity\Clase[] $clases
 */
class Sede extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
