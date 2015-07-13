<?php
namespace App\Model\Table;

use App\Model\Entity\Desvinculacione;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Desvinculaciones Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 */
class DesvinculacionesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('desvinculaciones');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('Users', [
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
            ->add('fecha_egreso', 'valid', ['rule' => 'date'])
            ->allowEmpty('fecha_egreso');
            
        $validator
            ->add('motivo', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('motivo');
            
        $validator
            ->allowEmpty('descripcion');
            
        $validator
            ->add('monto_deuda', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('monto_deuda');
            
        $validator
            ->allowEmpty('observaciones');

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
        return $rules;
    }
}
