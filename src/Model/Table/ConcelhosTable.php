<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Concelhos Model
 *
 * @method \App\Model\Entity\Concelho get($primaryKey, $options = [])
 * @method \App\Model\Entity\Concelho newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Concelho[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Concelho|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Concelho|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Concelho patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Concelho[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Concelho findOrCreate($search, callable $callback = null, $options = [])
 */
class ConcelhosTable extends Table
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

        $this->setTable('concelhos');
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
            ->nonNegativeInteger('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('CodigoConcelho', 'create')
            ->notEmpty('CodigoConcelho');

        $validator
            ->requirePresence('CodigoDistrito', 'create')
            ->notEmpty('CodigoDistrito');

        $validator
            ->scalar('Designacao')
            ->maxLength('Designacao', 100)
            ->requirePresence('Designacao', 'create')
            ->notEmpty('Designacao');

        return $validator;
    }
}
