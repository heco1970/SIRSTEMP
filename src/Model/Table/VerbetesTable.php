<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Verbetes Model
 *
 * @method \App\Model\Entity\Verbete get($primaryKey, $options = [])
 * @method \App\Model\Entity\Verbete newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Verbete[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Verbete|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Verbete|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Verbete patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Verbete[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Verbete findOrCreate($search, callable $callback = null, $options = [])
 */
class VerbetesTable extends Table
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

        $this->setTable('verbetes');
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
            ->integer('id_verbetes')
            ->allowEmpty('id_verbetes', 'create');

        $validator
            ->scalar('equipa')
            ->maxLength('equipa', 50)
            ->requirePresence('equipa', 'create')
            ->notEmpty('equipa');

        $validator
            ->scalar('dr_ds')
            ->maxLength('dr_ds', 50)
            ->requirePresence('dr_ds', 'create')
            ->notEmpty('dr_ds');

        $validator
            ->scalar('nome')
            ->maxLength('nome', 60)
            ->requirePresence('nome', 'create')
            ->notEmpty('nome');

        $validator
            ->scalar('designacao')
            ->maxLength('designacao', 200)
            ->requirePresence('designacao', 'create')
            ->notEmpty('designacao');

        $validator
            ->dateTime('hora_aplicada')
            ->requirePresence('hora_aplicada', 'create')
            ->notEmpty('hora_aplicada');

        $validator
            ->dateTime('hora_prevista')
            ->requirePresence('hora_prevista', 'create')
            ->notEmpty('hora_prevista');

        $validator
            ->scalar('actividade')
            ->maxLength('actividade', 100)
            ->requirePresence('actividade', 'create')
            ->notEmpty('actividade');

        $validator
            ->dateTime('data_fim_execucao')
            ->requirePresence('data_fim_execucao', 'create')
            ->notEmpty('data_fim_execucao');

        $validator
            ->dateTime('data')
            ->requirePresence('data', 'create')
            ->notEmpty('data');

        $validator
            ->scalar('tecnico')
            ->maxLength('tecnico', 60)
            ->requirePresence('tecnico', 'create')
            ->notEmpty('tecnico');

        return $validator;
    }
}
