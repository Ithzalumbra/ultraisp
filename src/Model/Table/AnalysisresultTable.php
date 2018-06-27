<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Analysisresult Model
 *
 * @property \App\Model\Table\AnalysisSamplesTable|\Cake\ORM\Association\BelongsTo $AnalysisSamples
 * @property \App\Model\Table\AnalysisTypesTable|\Cake\ORM\Association\BelongsTo $AnalysisTypes
 *
 * @method \App\Model\Entity\Analysisresult get($primaryKey, $options = [])
 * @method \App\Model\Entity\Analysisresult newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Analysisresult[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Analysisresult|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Analysisresult|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Analysisresult patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Analysisresult[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Analysisresult findOrCreate($search, callable $callback = null, $options = [])
 */
class AnalysisresultTable extends Table
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

        $this->setTable('analysisresult');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('AnalysisSamples', [
            'foreignKey' => 'analysisSamples_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('AnalysisTypes', [
            'foreignKey' => 'analysisType_id',
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
            ->integer('ppm')
            ->requirePresence('ppm', 'create')
            ->notEmpty('ppm');

        $validator
            ->date('date_register')
            ->requirePresence('date_register', 'create')
            ->notEmpty('date_register');

        $validator
            ->boolean('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        $validator
            ->scalar('employee_rut')
            ->maxLength('employee_rut', 12)
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
        $rules->add($rules->existsIn(['analysisSamples_id'], 'AnalysisSamples'));
        $rules->add($rules->existsIn(['analysisType_id'], 'AnalysisTypes'));

        return $rules;
    }
}
