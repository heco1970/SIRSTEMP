<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PessoasProcessos Model
 *
 * @property \App\Model\Table\PessoasTable|\Cake\ORM\Association\BelongsTo $Pessoas
 * @property \App\Model\Table\ProcessosTable|\Cake\ORM\Association\BelongsTo $Processos
 *
 * @method \App\Model\Entity\PessoasProcesso get($primaryKey, $options = [])
 * @method \App\Model\Entity\PessoasProcesso newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PessoasProcesso[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PessoasProcesso|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PessoasProcesso|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PessoasProcesso patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PessoasProcesso[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PessoasProcesso findOrCreate($search, callable $callback = null, $options = [])
 */
class PessoasProcessosTable extends Table
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

        $this->setTable('pessoas_processos');
        $this->setDisplayField('pessoas_id');
        $this->setPrimaryKey(['pessoas_id', 'processos_id']);

        $this->belongsTo('Pessoas', [
            'foreignKey' => 'pessoa_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Processos', [
            'foreignKey' => 'processo_id',
            'joinType' => 'INNER'
        ]);
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
        $rules->add($rules->existsIn(['processo_id'], 'Processos'));

        return $rules;
    }
}
