<?php
namespace App\Model\Table;

use App\Model\Entity\Pedido;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pedidos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Productos
 */
class PedidosTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('pedidos');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Productos', [
            'foreignKey' => 'producto_id',
            'joinType' => 'INNER'
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
            ->add('fecha_pedido', 'valid', ['rule' => 'date'])
            ->allowEmpty('fecha_pedido');
            
        $validator
            ->add('fecha_pago', 'valid', ['rule' => 'date'])
            ->allowEmpty('fecha_pago');
            
        $validator
            ->add('cantidad', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('cantidad');
            
        $validator
            ->add('valor', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('valor');
            
        $validator
            ->add('monto_pagado', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('monto_pagado');
            
        $validator
            ->add('fecha_entrega', 'valid', ['rule' => 'date'])
            ->allowEmpty('fecha_entrega');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['producto_id'], 'Productos'));
        return $rules;
    }
}
