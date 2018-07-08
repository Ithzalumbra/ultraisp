<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AnalysisResults Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\AnalysisSamplesTable|\Cake\ORM\Association\BelongsTo $AnalysisSamples
 * @property \App\Model\Table\AnalysisTypesTable|\Cake\ORM\Association\BelongsTo $AnalysisTypes
 *
 * @method \App\Model\Entity\AnalysisResult get($primaryKey, $options = [])
 * @method \App\Model\Entity\AnalysisResult newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AnalysisResult[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AnalysisResult|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AnalysisResult|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AnalysisResult patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AnalysisResult[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AnalysisResult findOrCreate($search, callable $callback = null, $options = [])
 */
class AnalysisResultsTable extends Table
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

        $this->setTable('analysis_results');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('AnalysisSamples', [
            'foreignKey' => 'analysisSamples_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('AnalysisTypes', [
            'foreignKey' => 'analysisType_id',
            'joinType' => 'INNER'
        ]);

        $this->addBehavior('Search.Search');
        $this->searchManager()
            ->add('analysisSamples_id', 'Search.Like', [
                'field' => ['analysisSamples_id']
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
        $rules->add($rules->existsIn(['analysisSamples_id'], 'AnalysisSamples'));
        $rules->add($rules->existsIn(['analysisType_id'], 'AnalysisTypes'));

        return $rules;
    }
}
