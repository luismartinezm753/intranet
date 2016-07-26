<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Escuelas Model
 *
 * @property \Cake\ORM\Association\HasMany $Sedes
 *
 * @method \App\Model\Entity\Escuela get($primaryKey, $options = [])
 * @method \App\Model\Entity\Escuela newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Escuela[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Escuela|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Escuela patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Escuela[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Escuela findOrCreate($search, callable $callback = null)
 */
class EscuelasTable extends Table
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

        $this->table('escuelas');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('Sedes', [
            'foreignKey' => 'escuela_id'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->allowEmpty('rut_tributario');

        $validator
            ->allowEmpty('estilo');

        $validator
            ->allowEmpty('representante');

        $validator
            ->allowEmpty('direccion');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->allowEmpty('pagina_web');

        $validator
            ->allowEmpty('telefono1');

        $validator
            ->allowEmpty('telefono2');

        $validator
            ->allowEmpty('comuna');

        $validator
            ->allowEmpty('pais');

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
        $rules->add($rules->isUnique(['email']));
        return $rules;
    }
}
