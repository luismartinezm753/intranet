<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity.
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'username' => true,
        'email' => true,
        'password' => true,
        'telefono' => true,
        'rol' => true,
        'fecha_ing' => true,
        'grado_id' => true,
        'nombre' => true,
        'referencia' => true,
        'estado' => true,
        'fecha_ult_acenso' => true,
        'fecha_nac' => true,
        'nombre_apoderado' => true,
        'telefono_apoderado' => true,
        'profesion' => true,
        'nota_salud' => true,
        'llevar_a' => true,
        'monto_paga' => true,
        'id_user_referencia' => true,
        'observaciones' => true,
        'fecha_cambio_password' => true,
        'foto' => true,
        'grado' => true,
        'clases' => true,
        'convenios_usuarios' => true,
        'desvinculaciones' => true,
        'historial_alumnos' => true,
        'pagos' => true,
        'pedidos' => true,
    ];

    protected function _setPassword($value)
    {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($value);
    }
}
