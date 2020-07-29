<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Estadocivils Model
 *
 * @method \App\Model\Entity\Estadocivil get($primaryKey, $options = [])
 * @method \App\Model\Entity\Estadocivil newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Estadocivil[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Estadocivil|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Estadocivil|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Estadocivil patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Estadocivil[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Estadocivil findOrCreate($search, callable $callback = null, $options = [])
 */
class EstadocivilsTable extends Table
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

        $this->setTable('estadocivils');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->scalar('estado')
            ->maxLength('estado', 100)
            ->requirePresence('estado', 'create')
            ->notEmpty('estado');

        return $validator;
    }
}
