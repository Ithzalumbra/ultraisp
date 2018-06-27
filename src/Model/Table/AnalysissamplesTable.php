<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Analysissamples Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Analysissample get($primaryKey, $options = [])
 * @method \App\Model\Entity\Analysissample newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Analysissample[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Analysissample|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Analysissample|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Analysissample patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Analysissample[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Analysissample findOrCreate($search, callable $callback = null, $options = [])
 */
class AnalysissamplesTable extends Table
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

        $this->setTable('analysissamples');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

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

        $validator
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmpty('date');

        $validator
            ->decimal('temperatureSample')
            ->requirePresence('temperatureSample', 'create')
            ->notEmpty('temperatureSample');

        $validator
            ->integer('quantitySample')
            ->requirePresence('quantitySample', 'create')
            ->notEmpty('quantitySample');

        $validator
            ->scalar('employee_rut')
            ->maxLength('employee_rut', 10)
            ->requirePresence('employee_rut', 'create')
            ->notEmpty('employee_rut');

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
