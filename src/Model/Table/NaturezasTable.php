<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Naturezas Model
 *
 * @property \App\Model\Table\ProcessosTable|\Cake\ORM\Association\HasMany $Processos
 *
 * @method \App\Model\Entity\Natureza get($primaryKey, $options = [])
 * @method \App\Model\Entity\Natureza newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Natureza[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Natureza|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Natureza|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Natureza patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Natureza[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Natureza findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class NaturezasTable extends Table
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

        $this->setTable('naturezas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Processos', [
            'foreignKey' => 'natureza_id'
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
            ->scalar('designacao')
            ->maxLength('designacao', 255)
            ->requirePresence('designacao', 'create')
            ->notEmpty('designacao');

        return $validator;
    }
}
