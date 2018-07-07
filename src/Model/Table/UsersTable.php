<?php
namespace App\Model\Table;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\UserTypesTable|\Cake\ORM\Association\BelongsTo $UserTypes
 * @property \App\Model\Table\AnalysisResultsTable|\Cake\ORM\Association\HasMany $AnalysisResults
 * @property \App\Model\Table\AnalysisSamplesTable|\Cake\ORM\Association\HasMany $AnalysisSamples
 * @property |\Cake\ORM\Association\HasMany $Contacts
 * @property |\Cake\ORM\Association\HasMany $Phones
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('UserTypes', [
            'foreignKey' => 'usertype_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('AnalysisResults', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('AnalysisSamples', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Contacts', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Phones', [
            'foreignKey' => 'user_id'
        ]);

//        $this->addBehavior('Search.Search');
//
//        $this->searchManager()
//            ->add('name', 'Search.Like', [
//                'before' => true,
//                'after' => true,
//                'comparison' => 'LIKE',
//                'wildcardAny' => '*',
//                'field' => ['name', 'lastname','lastname2']
//            ])
//            ->add('status', 'Search.Like', [
//                'field' => ['active']
//            ]);
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
            ->scalar('rut')
            ->maxLength('rut', 12)
            ->requirePresence('rut', 'create')
            ->notEmpty('rut');

        $validator
            ->scalar('name')
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->scalar('address')
            ->maxLength('address', 100)
            ->allowEmpty('address');

        $validator
            ->email('email')
            ->maxLength('address', 250)
            ->allowEmpty('email');

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
        $rules->add($rules->isUnique(['rut']));
        $rules->add($rules->existsIn(['usertype_id'], 'UserTypes'));

        return $rules;
    }

    public function beforeSave($event, $entity, $options)
    {
        if($entity->dirty('password')){
            $hasher = new DefaultPasswordHasher();
            $entity->password = $hasher->hash($entity->password);
        }
    }
}
