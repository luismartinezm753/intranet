<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Grados
 * @property \Cake\ORM\Association\HasMany $Clases
 * @property \Cake\ORM\Association\HasMany $ConveniosUsuarios
 * @property \Cake\ORM\Association\HasMany $Desvinculaciones
 * @property \Cake\ORM\Association\HasMany $HistorialAlumnos
 * @property \Cake\ORM\Association\HasMany $Pagos
 * @property \Cake\ORM\Association\HasMany $Pedidos
 */
class UsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('users');
        $this->displayField('username');
        $this->primaryKey('id');
        $this->belongsTo('Grados', [
            'foreignKey' => 'grado_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Clases', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('ConveniosUsuarios', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Desvinculaciones', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('HistorialAlumnos', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Pagos', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Pedidos', [
            'foreignKey' => 'user_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');
            
        $validator
            ->add('username', [
                'length' => [
                    'rule' => ['minLength', 6],
                    'message' => 'Nombre de Usario invalido',
                ]
            ])
            ->requirePresence('username', 'create')
            ->notEmpty('username');
            
        $validator
            ->add('email', 'valid', ['rule' => 'email'])
            ->requirePresence('email', 'create')
            ->notEmpty('email');
            
        $validator
            ->add('password', [
                'length' => [
                    'rule' => ['minLength', 6],
                    'message' => 'El largo minimo es 6',
                ]
            ])
            ->requirePresence('password', 'create')
            ->notEmpty('password');
            
        $validator
            ->add('telefono', [
                'length' => [
                    'rule' => ['minLength', 6],
                    'message' => 'Telefono invalido',
                ]
            ])
            ->add('telefono',[
                'alphanumeric'=>[
                    'rule'=>'numeric',
                    'message'=> 'Solo ingrese números'
                ]
            ])
            ->requirePresence('telefono', 'create')
            ->notEmpty('telefono');
            
        $validator
            ->requirePresence('rol', 'create')
            ->notEmpty('rol');
            
        $validator
            ->add('fecha_ing', 'valid', ['rule' => 'date'])
            ->requirePresence('fecha_ing', 'create')
            ->notEmpty('fecha_ing');
            
        $validator
            ->add('nombre', [
                'length' => [
                    'rule' => ['minLength', 2],
                    'message' => 'Nombre invalido',
                ]
            ])
            ->add('nombre',[
                'pattern'=>[
                    'rule'=>'[a-zA-Z]+',
                    'message'=>'Nombre invalido',
                ]
            ])
            ->requirePresence('nombre', 'create')
            ->notEmpty('nombre');
            
        $validator
            ->add('apellido', [
                'length' => [
                    'rule' => ['minLength', 2],
                    'message' => 'Apellido invalido',
                ]
            ])
            ->requirePresence('apellido', 'create')
            ->notEmpty('apellido');
            
        $validator
            ->requirePresence('referencia', 'create')
            ->notEmpty('referencia');
            
        $validator
            ->requirePresence('estado', 'create')
            ->notEmpty('estado');
            
        $validator
            ->add('fecha_ult_acenso', 'valid', ['rule' => 'date'])
            ->allowEmpty('fecha_ult_acenso');
            
        $validator
            ->add('fecha_nac', 'valid', ['rule' => 'date'])
            ->requirePresence('fecha_nac', 'create')
            ->notEmpty('fecha_nac');
            
        $validator
            ->add('nombre_apoderado', [
                'length' => [
                    'rule' => ['minLength', 2],
                    'message' => 'Nombre invalido',
                ]
            ])
            ->add('nombre_apoderado',[
                'pattern'=>[
                    'rule'=>'[a-zA-Z]+',
                    'message'=>'Nombre invalido',
                ]
            ])
            ->allowEmpty('nombre_apoderado');
            
        $validator
            ->add('telefono_apoderado', [
                'length' => [
                    'rule' => ['minLength', 6],
                    'message' => 'Telefono invalido',
                ]
            ])
            ->add('telefono_apoderado',[
                'alphanumeric'=>[
                    'rule'=>'numeric',
                    'message'=> 'Solo ingrese números'
                ]
            ])
            ->allowEmpty('telefono_apoderado');
            
        $validator
            ->requirePresence('profesion', 'create')
            ->notEmpty('profesion');
            
        $validator
            ->allowEmpty('nota_salud');
            
        $validator
            ->allowEmpty('llevar_a');
            
        $validator
            ->add('monto_paga', 'valid', ['rule' => 'numeric'])
            ->requirePresence('monto_paga', 'create')
            ->notEmpty('monto_paga');
            
        $validator
            ->add('id_user_referencia', 'valid', ['rule' => 'numeric'])
            ->requirePresence('id_user_referencia', 'create')
            ->notEmpty('id_user_referencia');
            
        $validator
            ->allowEmpty('observaciones');
            
        $validator
            ->add('fecha_cambio_password', 'valid', ['rule' => 'date'])
            ->allowEmpty('fecha_cambio_password');
            
        $validator
            ->allowEmpty('foto');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['grado_id'], 'Grados'));
        return $rules;
    }
}
