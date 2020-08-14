<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pedidosmotives Model
 *
 * @method \App\Model\Entity\Pedidosmotive get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pedidosmotive newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Pedidosmotive[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pedidosmotive|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pedidosmotive|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pedidosmotive patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pedidosmotive[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pedidosmotive findOrCreate($search, callable $callback = null, $options = [])
 */
class PedidosmotivesTable extends Table
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

        $this->setTable('pedidosmotives');
        $this->setDisplayField('descricao');
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
            ->scalar('descricao')
            ->maxLength('descricao', 45)
            ->requirePresence('descricao', 'create')
            ->notEmpty('descricao');

        return $validator;
    }
}