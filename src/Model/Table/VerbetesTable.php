<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Verbetes Model
 *
 * @property \App\Model\Table\PessoasTable|\Cake\ORM\Association\BelongsTo $Pessoas
 * @property \App\Model\Table\EstadosTable|\Cake\ORM\Association\BelongsTo $Estados
 * @property \App\Model\Table\PedidosTable|\Cake\ORM\Association\BelongsTo $Pedidos
 *
 * @method \App\Model\Entity\Verbete get($primaryKey, $options = [])
 * @method \App\Model\Entity\Verbete newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Verbete[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Verbete|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Verbete|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Verbete patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Verbete[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Verbete findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
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

        $this->addBehavior('Timestamp');

        $this->belongsTo('Pessoas', [
            'foreignKey' => 'pessoa_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Estados', [
            'foreignKey' => 'estado_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Pedidos', [
            'foreignKey' => 'pedido_id',
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
            ->scalar('nip')
            ->maxLength('nip', 20)
            ->requirePresence('nip', 'create')
            ->notEmpty('nip');

        $validator
            ->date('datacriacao')
            ->requirePresence('datacriacao', 'create')
            ->notEmpty('datacriacao');

        $validator
            ->date('datadistribuicao')
            ->requirePresence('datadistribuicao', 'create')
            ->notEmpty('datadistribuicao');

        $validator
            ->date('datainicioefectiva')
            ->requirePresence('datainicioefectiva', 'create')
            ->notEmpty('datainicioefectiva');

        $validator
            ->date('dataefectivatermino')
            ->requirePresence('dataefectivatermino', 'create')
            ->notEmpty('dataefectivatermino');

        $validator
            ->date('datainiciop')
            ->requirePresence('datainiciop', 'create')
            ->notEmpty('datainiciop');

        $validator
            ->date('dataprevistat')
            ->requirePresence('dataprevistat', 'create')
            ->notEmpty('dataprevistat');

        $validator
            ->scalar('ep')
            ->maxLength('ep', 255)
            ->requirePresence('ep', 'create')
            ->notEmpty('ep');

        $validator
            ->scalar('observacoes')
            ->maxLength('observacoes', 255)
            ->requirePresence('observacoes', 'create')
            ->notEmpty('observacoes');

        $validator
            ->scalar('motivo')
            ->maxLength('motivo', 255)
            ->requirePresence('motivo', 'create')
            ->notEmpty('motivo');

        $validator
            ->scalar('concluidof')
            ->requirePresence('concluidof', 'create')
            ->notEmpty('concluidof');

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
        $rules->add($rules->existsIn(['pessoa_id'], 'Pessoas'));
        $rules->add($rules->existsIn(['estado_id'], 'Estados'));
        $rules->add($rules->existsIn(['pedido_id'], 'Pedidos'));

        return $rules;
    }
}
