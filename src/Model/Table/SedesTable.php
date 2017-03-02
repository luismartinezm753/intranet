<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sedes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Escuelas
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\HasMany $Clases
 *
 * @method \App\Model\Entity\Sede get($primaryKey, $options = [])
 * @method \App\Model\Entity\Sede newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Sede[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sede|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sede patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Sede[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sede findOrCreate($search, callable $callback = null, $options = [])
 */
class SedesTable extends Table
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

        $this->setTable('sedes');
        $this->setDisplayField('nombre');
        $this->setPrimaryKey('id');

        $this->belongsTo('Escuelas', [
            'foreignKey' => 'escuela_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'director_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Clases', [
            'foreignKey' => 'sede_id'
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
            ->requirePresence('nombre', 'create')
            ->notEmpty('nombre');

        $validator
            ->requirePresence('direccion', 'create')
            ->notEmpty('direccion');

        $validator
            ->requirePresence('telefono', 'create')
            ->notEmpty('telefono');

        $validator
            ->requirePresence('comuna', 'create')
            ->notEmpty('comuna');

        $validator
            ->requirePresence('ciudad', 'create')
            ->notEmpty('ciudad');

        $validator
            ->date('fecha_inicio')
            ->requirePresence('fecha_inicio', 'create')
            ->notEmpty('fecha_inicio');

        $validator
            ->integer('monto_arriendo')
            ->requirePresence('monto_arriendo', 'create')
            ->notEmpty('monto_arriendo');

        $validator
            ->requirePresence('nombre_arrendador', 'create')
            ->notEmpty('nombre_arrendador');

        $validator
            ->requirePresence('mail_arrendador', 'create')
            ->notEmpty('mail_arrendador');

        $validator
            ->requirePresence('telefono_arrendador', 'create')
            ->notEmpty('telefono_arrendador');

        $validator
            ->allowEmpty('logo');

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
        $rules->add($rules->existsIn(['escuela_id'], 'Escuelas'));
        $rules->add($rules->existsIn(['director_id'], 'Users'));

        return $rules;
    }
}
