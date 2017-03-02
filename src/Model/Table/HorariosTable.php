<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Horarios Model
 *
 * @property \Cake\ORM\Association\HasMany $Clases
 *
 * @method \App\Model\Entity\Horario get($primaryKey, $options = [])
 * @method \App\Model\Entity\Horario newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Horario[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Horario|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Horario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Horario[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Horario findOrCreate($search, callable $callback = null)
 */
class HorariosTable extends Table
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

        $this->setTable('horarios');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Clases', [
            'foreignKey' => 'horario_id'
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

        $validator
            ->requirePresence('dia1', 'create')
            ->notEmpty('dia1');

        $validator
            ->allowEmpty('dia2');

        $validator
            ->allowEmpty('dia3');

        $validator
            ->allowEmpty('dia4');

        $validator
            ->time('horario_inicio1')
            ->requirePresence('horario_inicio1', 'create')
            ->notEmpty('horario_inicio1');

        $validator
            ->time('horario_inicio2')
            ->allowEmpty('horario_inicio2');

        $validator
            ->time('horario_inicio3')
            ->allowEmpty('horario_inicio3');

        $validator
            ->time('horario_inicio4')
            ->allowEmpty('horario_inicio4');

        $validator
            ->time('horario_termino1')
            ->requirePresence('horario_termino1', 'create')
            ->notEmpty('horario_termino1');

        $validator
            ->time('horario_termino2')
            ->allowEmpty('horario_termino2');

        $validator
            ->time('horario_termino3')
            ->allowEmpty('horario_termino3');

        $validator
            ->time('horario_termino4')
            ->allowEmpty('horario_termino4');

        return $validator;
    }
}
