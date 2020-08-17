<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PessoasCrimes Model
 *
 * @property \App\Model\Table\PessoasTable|\Cake\ORM\Association\BelongsTo $Pessoas
 * @property \App\Model\Table\CrimesTable|\Cake\ORM\Association\BelongsTo $Crimes
 *
 * @method \App\Model\Entity\PessoasCrime get($primaryKey, $options = [])
 * @method \App\Model\Entity\PessoasCrime newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PessoasCrime[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PessoasCrime|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PessoasCrime|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PessoasCrime patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PessoasCrime[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PessoasCrime findOrCreate($search, callable $callback = null, $options = [])
 */
class PessoasCrimesTable extends Table
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

        $this->setTable('pessoas_crimes');
        $this->setDisplayField('pessoa_id');
        $this->setPrimaryKey(['pessoa_id', 'crime_id']);

        $this->belongsTo('Pessoas', [
            'foreignKey' => 'pessoa_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Crimes', [
            'foreignKey' => 'crime_id',
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
        $rules->add($rules->existsIn(['crime_id'], 'Crimes'));

        return $rules;
    }
}
