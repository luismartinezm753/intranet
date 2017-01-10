<?php
namespace FullCalendar\Model\Entity;

use Cake\ORM\Entity;

/**
 * Event Entity.
 */
class Event extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'id' => false,
        '*' => true,
    ];

    protected function _getFullAddress(){
        return $this->_properties['address'] . ', ' . $this->_properties['comuna'].', '.$this->_properties['region'];
    }
}
