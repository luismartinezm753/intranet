<?php
namespace App\Model\Table;

use App\Model\Entity\Grado;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Grados Model
 *
 * @property \Cake\ORM\Association\HasMany $Users
 */
class GradosTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('grados');
        $this->displayField('grado');
        $this->primaryKey('id');
        $this->hasMany('Users', [
            'foreignKey' => 'grado_id'
        ]);
        $this->hasMany('Videos',['foreignKey'=>'grado_id']);
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
            ->requirePresence('grado', 'create')
            ->notEmpty('grado');
            
        $validator
            ->add('programa','extension',['rule'=>['extension','pdf']])
            ->add('programa','size',['rule'=>['fileSize','5MB']])
            ->requirePresence('programa', 'create')
            ->notEmpty('programa');
            
        $validator
            ->add('duracion_mes', 'valid', ['rule' => 'numeric'])
            ->add('duracion_mes', 'gtzero', ['rule'=>['comparison','>=',0]])
            ->requirePresence('duracion_mes', 'create')
            ->notEmpty('duracion_mes');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['grado']));
        return $rules;
    }
}
