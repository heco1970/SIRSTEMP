<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pedidos Model
 *
 * @property \App\Model\Table\ProcessosTable|\Cake\ORM\Association\BelongsTo $Processos
 * @property \App\Model\Table\PessoasTable|\Cake\ORM\Association\BelongsTo $Pessoas
 * @property \App\Model\Table\PedidostypesTable|\Cake\ORM\Association\BelongsTo $Pedidostypes
 * @property \App\Model\Table\TeamsTable|\Cake\ORM\Association\BelongsTo $Teams
 * @property \App\Model\Table\StatesTable|\Cake\ORM\Association\BelongsTo $States
 * @property \App\Model\Table\PedidosmotivesTable|\Cake\ORM\Association\BelongsTo $Pedidosmotives
 * @property \App\Model\Table\PaisTable|\Cake\ORM\Association\BelongsTo $Pais
 * @property \App\Model\Table\ConcelhosTable|\Cake\ORM\Association\BelongsTo $Concelhos
 * @property \App\Model\Table\VerbetesTable|\Cake\ORM\Association\HasMany $Verbetes
 *
 * @method \App\Model\Entity\Pedido get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pedido newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Pedido[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pedido|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pedido|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pedido patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pedido[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pedido findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PedidosTable extends Table
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

        $this->setTable('pedidos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Processos', [
            'foreignKey' => 'processo_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Pessoas', [
            'foreignKey' => 'pessoa_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Pedidostypes', [
            'foreignKey' => 'pedidostype_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Teams', [
            'foreignKey' => 'team_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('States', [
            'foreignKey' => 'state_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Pedidosmotives', [
            'foreignKey' => 'pedidosmotive_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Pais', [
            'foreignKey' => 'pais_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Concelhos', [
            'foreignKey' => 'concelho_id'
        ]);
        $this->hasMany('Verbetes', [
            'foreignKey' => 'pedido_id'
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
            ->scalar('referencia')
            ->maxLength('referencia', 20)
            ->requirePresence('referencia', 'create')
            ->notEmpty('referencia');

        $validator
            ->scalar('canalentrada')
            ->maxLength('canalentrada', 20)
            ->requirePresence('canalentrada', 'create')
            ->notEmpty('canalentrada');

        $validator
            ->date('datarecepcao')
            ->requirePresence('datarecepcao', 'create')
            ->notEmpty('datarecepcao');

        $validator
            ->scalar('origem')
            ->maxLength('origem', 20)
            ->requirePresence('origem', 'create')
            ->notEmpty('origem');

        $validator
            ->date('termino')
            ->requirePresence('termino', 'create')
            ->notEmpty('termino');

        $validator
            ->integer('numeropedido')
            ->maxLength('numeropedido', 9)
            ->naturalNumber('numeropedido') 
            ->requirePresence('numeropedido', 'create')
            ->notEmpty('numeropedido');

        $validator
            ->date('datacriacao')
            ->requirePresence('datacriacao', 'create')
            ->notEmpty('datacriacao');

        $validator
            ->date('dataatribuicao')
            ->requirePresence('dataatribuicao', 'create')
            ->notEmpty('dataatribuicao');

        $validator
            ->date('datainicioefectivo')
            ->requirePresence('datainicioefectivo', 'create')
            ->notEmpty('datainicioefectivo');

        $validator
            ->date('datatermoprevisto')
            ->requirePresence('datatermoprevisto', 'create')
            ->notEmpty('datatermoprevisto');

        $validator
            ->date('dataefectivatermo')
            ->requirePresence('dataefectivatermo', 'create')
            ->notEmpty('dataefectivatermo');

        $validator
            ->scalar('transferencias')
            ->maxLength('transferencias', 45)
            ->requirePresence('transferencias', 'create')
            ->notEmpty('transferencias');

        $validator
            ->scalar('gestor')
            ->maxLength('gestor', 45)
            ->requirePresence('gestor', 'create')
            ->notEmpty('gestor');

        $validator
            ->scalar('seguro')
            ->maxLength('seguro', 45)
            ->requirePresence('seguro', 'create')
            ->notEmpty('seguro');

        $validator
            ->scalar('periocidaderelatorios')
            ->maxLength('periocidaderelatorios', 45)
            ->requirePresence('periocidaderelatorios', 'create')
            ->notEmpty('periocidaderelatorios');

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
        $rules->add($rules->existsIn(['processo_id'], 'Processos'));
        $rules->add($rules->existsIn(['pessoa_id'], 'Pessoas'));
        $rules->add($rules->existsIn(['pedidostype_id'], 'Pedidostypes'));
        $rules->add($rules->existsIn(['team_id'], 'Teams'));
        $rules->add($rules->existsIn(['state_id'], 'States'));
        $rules->add($rules->existsIn(['pedidosmotive_id'], 'Pedidosmotives'));
        $rules->add($rules->existsIn(['pais_id'], 'Pais'));
        $rules->add($rules->existsIn(['concelho_id'], 'Concelhos'));

        return $rules;
    }
}
