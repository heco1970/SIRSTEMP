<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Crimes Model
 *
 * @property \App\Model\Table\ProcessosTable|\Cake\ORM\Association\BelongsTo $Processos
 * @property \App\Model\Table\TipocrimesTable|\Cake\ORM\Association\BelongsTo $Tipocrimes
 * @property \App\Model\Table\PessoasTable|\Cake\ORM\Association\BelongsToMany $Pessoas
 *
 * @method \App\Model\Entity\Crime get($primaryKey, $options = [])
 * @method \App\Model\Entity\Crime newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Crime[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Crime|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Crime|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Crime patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Crime[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Crime findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CrimesTable extends Table
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

        $this->setTable('crimes');
        $this->setDisplayField('descricao');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Processos', [
            'foreignKey' => 'processo_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Tipocrimes', [
            'foreignKey' => 'tipocrime_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Pessoas', [
            'foreignKey' => 'crime_id',
            'targetForeignKey' => 'pessoa_id',
            'joinTable' => 'pessoas_crimes'
        ]);
        $this->hasMany('PessoasCrimes');

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
            ->nonNegativeInteger('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('ocorrencia')
            ->maxLength('ocorrencia', 45)
            ->requirePresence('ocorrencia', 'create')
            ->notEmpty('ocorrencia');

        $validator
            ->scalar('registo')
            ->maxLength('registo', 45)
            ->requirePresence('registo', 'create')
            ->notEmpty('registo');

        $validator
            ->integer('qte')
            ->requirePresence('qte', 'create')
            ->notEmpty('qte');

        $validator
            ->scalar('apenaspre')
            ->maxLength('apenaspre', 45)
            ->requirePresence('apenaspre', 'create')
            ->notEmpty('apenaspre');

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
        $rules->add($rules->existsIn(['tipocrime_id'], 'Tipocrimes'));

        return $rules;
    }
}
