<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Processos Model
 *
 * @property \App\Model\Table\ProcessosTable|\Cake\ORM\Association\BelongsTo $Processos
 * @property \App\Model\Table\EntidadejudiciaisTable|\Cake\ORM\Association\BelongsTo $Entidadejudiciais
 * @property \App\Model\Table\UnitsTable|\Cake\ORM\Association\BelongsTo $Units
 * @property \App\Model\Table\StatesTable|\Cake\ORM\Association\BelongsTo $States
 * @property \App\Model\Table\CrimesTable|\Cake\ORM\Association\HasMany $Crimes
 * @property \App\Model\Table\PedidosTable|\Cake\ORM\Association\HasMany $Pedidos
 * @property \App\Model\Table\ProcessosTable|\Cake\ORM\Association\HasMany $Processos
 *
 * @method \App\Model\Entity\Processo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Processo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Processo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Processo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Processo|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Processo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Processo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Processo findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProcessosTable extends Table
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

        $this->setTable('processos');
        $this->setDisplayField('nip');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Entidadejudiciais', [
            'foreignKey' => 'entidadejudiciai_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Units', [
            'foreignKey' => 'unit_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('States', [
            'foreignKey' => 'state_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Crimes', [
            'foreignKey' => 'processo_id'
        ]);
        $this->hasMany('Pedidos', [
            'foreignKey' => 'processo_id'
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
            ->integer('processo_id')
            ->requirePresence('processo_id', 'create')
            ->notEmpty('processo_id');

        $validator
            ->scalar('natureza')
            ->maxLength('natureza', 200)
            ->requirePresence('natureza', 'create')
            ->notEmpty('natureza');

        $validator
            ->scalar('nip')
            ->maxLength('nip', 50)
            ->requirePresence('nip', 'create')
            ->notEmpty('nip');

        $validator
            ->scalar('observacoes')
            ->allowEmpty('observacoes');

        $validator
            ->date('dataconclusao')
            ->allowEmpty('dataconclusao');

        $validator
            ->scalar('ultimaalteracao')
            ->maxLength('ultimaalteracao', 45)
            ->requirePresence('ultimaalteracao', 'create')
            ->notEmpty('ultimaalteracao');

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
    {   $rules->add($rules->isUnique(['processo_id'], 'Já existe um processo com o mesmo ID.'));
        $rules->add($rules->existsIn(['entidadejudiciai_id'], 'Entidadejudiciais'));
        $rules->add($rules->existsIn(['unit_id'], 'Units'));
        $rules->add($rules->existsIn(['state_id'], 'States'));

        return $rules;
    }
}
