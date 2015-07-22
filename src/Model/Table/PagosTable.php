<?php
namespace App\Model\Table;

use App\Model\Entity\Pago;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pagos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 */
class PagosTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('pagos');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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
            ->requirePresence('mes', 'create')
            ->notEmpty('mes');
            
        $validator
            ->add('monto', 'valid', ['rule' => 'numeric'])
            ->add('monto', 'gtzero', ['rule'=>['comparison','>=',0]])
            ->requirePresence('monto', 'create')
            ->notEmpty('monto');
            
        $validator
            ->requirePresence('año', 'create')
            ->notEmpty('año');
            
        $validator
            ->allowEmpty('observacion');
            
        $validator
            ->add('fecha_pago', 'valid', ['rule' => 'date'])
            ->requirePresence('fecha_pago', 'create')
            ->notEmpty('fecha_pago');
            
        $validator
            ->add('forma_pago', 'inList', [
                'rule' => ['inList', ['Efectivo','Transferencia','Cheque']],
                'message' => 'Forma de pago invalida'
            ])
            ->requirePresence('forma_pago', 'create')
            ->notEmpty('forma_pago');

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
