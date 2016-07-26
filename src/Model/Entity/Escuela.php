<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Escuela Entity
 *
 * @property int $id
 * @property string $name
 * @property string $rut_tributario
 * @property string $estilo
 * @property string $representante
 * @property string $direccion
 * @property string $email
 * @property string $pagina_web
 * @property string $telefono1
 * @property string $telefono2
 * @property string $comuna
 * @property string $pais
 *
 * @property \App\Model\Entity\Sede[] $sedes
 */
class Escuela extends Entity
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
