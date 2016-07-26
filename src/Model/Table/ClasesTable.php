<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Clases Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Sedes
 * @property \Cake\ORM\Association\BelongsTo $Horarios
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Clase get($primaryKey, $options = [])
 * @method \App\Model\Entity\Clase newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Clase[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Clase|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Clase patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Clase[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Clase findOrCreate($search, callable $callback = null)
 */
class ClasesTable extends Table
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

        $this->table('clases');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Sedes', [
            'foreignKey' => 'sede_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Horarios', [
            'foreignKey' => 'horario_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'instructor_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'ayudante1_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'ayudante2_id'
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
            ->date('fecha_inicio')
            ->allowEmpty('fecha_inicio');

        $validator
            ->date('fecha_termino')
            ->allowEmpty('fecha_termino');

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
        $rules->add($rules->existsIn(['sede_id'], 'Sedes'));
        $rules->add($rules->existsIn(['horario_id'], 'Horarios'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['instructor_id'], 'Users'));
        $rules->add($rules->existsIn(['ayudante1_id'], 'Users'));
        $rules->add($rules->existsIn(['ayudante2_id'], 'Users'));
        return $rules;
    }
}
