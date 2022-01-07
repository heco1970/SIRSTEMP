<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Contactos Model
 *
 * @property \App\Model\Table\PessoasTable|\Cake\ORM\Association\BelongsTo $Pessoas
 * @property |\Cake\ORM\Association\BelongsTo $Pais
 *
 * @method \App\Model\Entity\Contacto get($primaryKey, $options = [])
 * @method \App\Model\Entity\Contacto newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Contacto[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Contacto|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Contacto|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Contacto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Contacto[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Contacto findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ContactosTable extends Table
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

        $this->setTable('contactos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Pessoas', [
            'foreignKey' => 'pessoa_id',
            'joinType' => 'INNER'
        ]);
        /* $this->belongsTo('Pais', [
            'foreignKey' => 'pais_id',
            'joinType' => 'INNER'
        ]); */
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
            ->scalar('nome')
            ->maxLength('nome', 250)
            ->requirePresence('nome', 'create')
            ->notEmpty('nome');

        $validator
            ->scalar('localidade')
            ->allowEmpty('localidade')
            ->maxLength('localidade', 250);

        $validator
            ->scalar('telefone')
            ->allowEmpty('telefone')
            ->maxLength('telefone', 50);

        $validator
            ->scalar('telemovel')
            ->allowEmpty('telemovel')
            ->maxLength('telemovel', 50);

        $validator
            ->scalar('fax')
            ->allowEmpty('fax')
            ->maxLength('fax', 50);

        $validator
            ->email('email')
            ->allowEmpty('email')
            ->maxLength('email', 250);

        $validator
            ->scalar('descricao')
            ->allowEmpty('descricao')
            ->maxLength('descricao', 250);

        $validator
            ->requirePresence('estado', 'create')
            ->notEmpty('estado');

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
        // $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['pessoa_id'], 'Pessoas'));
        // $rules->add($rules->existsIn(['pais_id'], 'Pais'));

        return $rules;
    }
}
