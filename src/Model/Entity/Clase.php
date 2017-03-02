<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;


/**
 * Clase Entity
 *
 * @property int $id
 * @property int $sede_id
 * @property int $horario_id
 * @property int $instructor_id
 * @property int $ayudante1_id
 * @property int $ayudante2_id
 * @property \Cake\I18n\Time $fecha_inicio
 * @property \Cake\I18n\Time $fecha_termino
 *
 * @property \App\Model\Entity\Sede $sede
 * @property \App\Model\Entity\Horario $horario
 * @property \App\Model\Entity\User $user
 */
class Clase extends Entity
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

    protected function _getName(){
        $sedes=TableRegistry::get('sedes');
        $horarios=TableRegistry::get('horarios');
        $sede=$sedes->get($this->_properties['sede_id']);
        $horario=$horarios->get($this->_properties['horario_id']);
        return $sede->nombre.' '.$horario->name;
    }
}
