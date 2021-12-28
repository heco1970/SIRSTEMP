<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Formularios Model
 *
 * @method \App\Model\Entity\Formulario get($primaryKey, $options = [])
 * @method \App\Model\Entity\Formulario newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Formulario[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Formulario|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Formulario|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Formulario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Formulario[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Formulario findOrCreate($search, callable $callback = null, $options = [])
 */
class FormulariosTable extends Table
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

        $this->setTable('formularios');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Pedidos', [
            'foreignKey' => 'id_pedido',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Teams', [
            'foreignKey' => 'id_equipa',
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
            ->allowEmpty('id', 'create')
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->integer('id_equipa')
            ->requirePresence('id_equipa', 'create')
            ->notEmpty('id_equipa');

        $validator
            ->integer('id_pedido')
            ->requirePresence('id_pedido', 'create')
            ->notEmpty('id_pedido');

        $validator
            ->scalar('dr_ds')
            ->maxLength('dr_ds', 50)
            ->requirePresence('dr_ds', 'create')
            ->notEmpty('dr_ds');

        $validator
            ->scalar('nome_prestador_trabalho')
            ->maxLength('nome_prestador_trabalho', 100)
            ->requirePresence('nome_prestador_trabalho', 'create')
            ->notEmpty('nome_prestador_trabalho');

        $validator
            ->scalar('designacao_entidade')
            ->maxLength('designacao_entidade', 200)
            ->requirePresence('designacao_entidade', 'create')
            ->notEmpty('designacao_entidade');

        $validator
            ->integer('hora_aplicadas')
            ->requirePresence('hora_aplicadas', 'create')
            ->notEmpty('hora_aplicadas');

        $validator
            ->integer('hora_prestadas')
            ->requirePresence('hora_prestadas', 'create')
            ->notEmpty('hora_prestadas');

        $validator
            ->scalar('actividade_exercida')
            ->maxLength('actividade_exercida', 100)
            ->requirePresence('actividade_exercida', 'create')
            ->notEmpty('actividade_exercida');

        $validator
            ->date('data_fim_execucao')
            ->requirePresence('data_fim_execucao', 'create')
            ->notEmpty('data_fim_execucao');

        $validator
            ->date('data')
            ->requirePresence('data', 'create')
            ->notEmpty('data');

        $validator
            ->scalar('tecnico')
            ->maxLength('tecnico', 60)
            ->requirePresence('tecnico', 'create')
            ->notEmpty('tecnico');

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
