<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\I18n\Time;


/**
 * Horario Entity
 *
 * @property int $id
 * @property string $dia1
 * @property string $dia2
 * @property string $dia3
 * @property string $dia4
 * @property \Cake\I18n\Time $horario_inicio1
 * @property \Cake\I18n\Time $horario_inicio2
 * @property \Cake\I18n\Time $horario_inicio3
 * @property \Cake\I18n\Time $horario_inicio4
 * @property \Cake\I18n\Time $horario_termino1
 * @property \Cake\I18n\Time $horario_termino2
 * @property \Cake\I18n\Time $horario_termino3
 * @property \Cake\I18n\Time $horario_termino4
 *
 * @property \App\Model\Entity\Clase[] $clases
 */
class Horario extends Entity
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
        #Time::setToStringFormat('HH:MM');
        return $this->_properties['dia1'].'-'.$this->_properties['horario_inicio1']->i18nFormat('HH:mm').' '.$this->_properties['dia2'].'-'.$this->_properties['horario_inicio2']->i18nFormat('HH:mm');
    }
}
