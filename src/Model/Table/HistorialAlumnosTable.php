<?php
namespace App\Model\Table;

use App\Model\Entity\HistorialAlumno;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * HistorialAlumnos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 */
class HistorialAlumnosTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('historial_alumnos');
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
            ->add('fecha', 'valid', ['rule' => 'date'])
            ->requirePresence('fecha', 'create')
            ->notEmpty('fecha');
            
        $validator
            ->add('tipo', 'valid', ['rule' => 'numeric'])
            ->requirePresence('tipo', 'create')
            ->notEmpty('tipo');
            
        $validator
            ->requirePresence('descripcion', 'create')
            ->notEmpty('descripcion');
            
        $validator
            ->requirePresence('logro', 'create')
            ->notEmpty('logro');

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
