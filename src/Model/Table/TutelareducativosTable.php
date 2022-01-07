<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tutelareducativos Model
 *
 * @method \App\Model\Entity\Tutelareducativo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tutelareducativo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Tutelareducativo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tutelareducativo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tutelareducativo|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tutelareducativo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tutelareducativo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tutelareducativo findOrCreate($search, callable $callback = null, $options = [])
 */
class TutelareducativosTable extends Table
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

        $this->setTable('tutelareducativos');
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
            ->allowEmpty('id', 'create');

        $validator
            ->integer('id_pedido')
            ->requirePresence('id_pedido', 'create')
            ->notEmpty('id_pedido');

        $validator
            ->integer('id_equipa')
            ->requirePresence('id_equipa', 'create')
            ->notEmpty('id_equipa');

        $validator
            ->scalar('nome_jovem')
            ->maxLength('nome_jovem', 45)
            ->requirePresence('nome_jovem', 'create')
            ->notEmpty('nome_jovem');

        $validator
            ->integer('nif')
            ->requirePresence('nif', 'create')
            ->notEmpty('nif');

        $validator
            ->date('data_nascimento')
            ->requirePresence('data_nascimento', 'create')
            ->notEmpty('data_nascimento');

        $validator
            ->scalar('designacao_entidade')
            ->maxLength('designacao_entidade', 45)
            ->requirePresence('designacao_entidade', 'create')
            ->notEmpty('designacao_entidade');

        $validator
            ->date('data_inicio')
            ->requirePresence('data_inicio', 'create')
            ->notEmpty('data_inicio');

        return $validator;
    }
}
