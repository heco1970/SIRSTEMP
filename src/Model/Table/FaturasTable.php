<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Faturas Model
 *
 * @method \App\Model\Entity\Fatura get($primaryKey, $options = [])
 * @method \App\Model\Entity\Fatura newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Fatura[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Fatura|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fatura|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fatura patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Fatura[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Fatura findOrCreate($search, callable $callback = null, $options = [])
 */
class FaturasTable extends Table
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

        $this->setTable('faturas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Entidadejudiciais', [
            'foreignKey' => 'id_entidade',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Units', [
            'foreignKey' => 'id_unidade',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Pagamentos', [
            'foreignKey' => 'id_pagamento',
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
            ->integer('id_entidade')
            ->requirePresence('id_entidade', 'create')
            ->notEmpty('id_entidade');

        $validator
            ->integer('id_unidade')
            ->requirePresence('id_unidade', 'create')
            ->notEmpty('id_unidade');

        $validator
            ->integer('id_pagamento')
            ->requirePresence('id_pagamento', 'create')
            ->notEmpty('id_pagamento');

        $validator
            ->integer('num_fatura')
            ->requirePresence('num_fatura', 'create')
            ->notEmpty('num_fatura');

        $validator
            ->integer('nip')
            ->requirePresence('nip', 'create')
            ->notEmpty('nip');

        $validator
            ->date('data_emissao')
            ->requirePresence('data_emissao', 'create')
            ->notEmpty('data_emissao');

        $validator
            ->numeric('valor')
            ->requirePresence('valor', 'create')
            ->notEmpty('valor');

        $validator
            ->date('data_pagamento')
            ->requirePresence('data_pagamento', 'create')
            ->notEmpty('data_pagamento');

        $validator
            ->scalar('ref_pagamento')
            ->maxLength('ref_pagamento', 50)
            ->requirePresence('ref_pagamento', 'create')
            ->notEmpty('ref_pagamento');

        $validator
            ->date('ultima_alteracao')
            ->requirePresence('ultima_alteracao', 'create')
            ->notEmpty('ultima_alteracao');

        $validator
            ->scalar('utilizador')
            ->maxLength('utilizador', 50)
            ->requirePresence('utilizador', 'create')
            ->notEmpty('utilizador');

        $validator
            ->scalar('observacoes')
            ->maxLength('observacoes', 200)
            ->allowEmpty('observacoes');

        $validator
            ->scalar('referencia')
            ->maxLength('referencia', 50)
            ->requirePresence('referencia', 'create')
            ->notEmpty('referencia');

        $validator
            ->date('data')
            ->requirePresence('data', 'create')
            ->notEmpty('data');

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
