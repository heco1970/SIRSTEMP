<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UserStates Model
 *
 * @property \App\Model\Table\AttemptsTable|\Cake\ORM\Association\HasMany $Attempts
 *
 * @method \App\Model\Entity\UserState get($primaryKey, $options = [])
 * @method \App\Model\Entity\UserState newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UserState[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UserState|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserState|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserState patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UserState[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UserState findOrCreate($search, callable $callback = null, $options = [])
 */
class UserStatesTable extends Table
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

        $this->setTable('user_states');
        $this->setDisplayField('descri');
        $this->setPrimaryKey('id');

        $this->hasMany('Attempts', [
            'foreignKey' => 'user_state_id'
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
            ->allowEmpty('id', 'create')
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('descri')
            ->maxLength('descri', 30)
            ->requirePresence('descri', 'create')
            ->notEmpty('descri');

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
        $rules->add($rules->isUnique(['id']));

        return $rules;
    }
}
