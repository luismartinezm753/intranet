<?php
namespace App\Model\Table;

use App\Model\Entity\Producto;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Productos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Proveedores
 * @property \Cake\ORM\Association\HasMany $Pedidos
 */
class ProductosTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('productos');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('Proveedores', [
            'foreignKey' => 'proveedor_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Pedidos', [
            'foreignKey' => 'producto_id'
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
            ->requirePresence('nombre', 'create')
            ->notEmpty('nombre');
            
        $validator
            ->requirePresence('descripcion', 'create')
            ->notEmpty('descripcion');
            
        $validator
            ->add('precio', 'valid', ['rule' => 'numeric'])
            ->requirePresence('precio', 'create')
            ->notEmpty('precio');
            
        $validator
            ->add('estado', 'valid', ['rule' => 'boolean'])
            ->requirePresence('estado', 'create')
            ->notEmpty('estado');
            
        $validator
            ->requirePresence('imagen', 'create')
            ->notEmpty('imagen');

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
        $rules->add($rules->existsIn(['proveedor_id'], 'Proveedores'));
        return $rules;
    }
}
