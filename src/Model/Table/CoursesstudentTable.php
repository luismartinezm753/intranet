<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Coursesstudent Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Clases
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Coursesstudent get($primaryKey, $options = [])
 * @method \App\Model\Entity\Coursesstudent newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Coursesstudent[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Coursesstudent|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Coursesstudent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Coursesstudent[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Coursesstudent findOrCreate($search, callable $callback = null, $options = [])
 */
class CoursesstudentTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('coursesstudent');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Clases', [
            'foreignKey' => 'clase_id',
            'joinType' => 'INNER'
        ]);
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
            ->integer('id')
            ->allowEmpty('id', 'create');

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
        $rules->add($rules->existsIn(['clase_id'], 'Clases'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
