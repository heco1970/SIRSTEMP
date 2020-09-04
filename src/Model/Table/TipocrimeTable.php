<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tipocrime Model
 *
 * @property \App\Model\Table\CrimesTable|\Cake\ORM\Association\HasMany $Crimes
 *
 * @method \App\Model\Entity\Tipocrime get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tipocrime newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Tipocrime[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tipocrime|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tipocrime|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tipocrime patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tipocrime[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tipocrime findOrCreate($search, callable $callback = null, $options = [])
 */
class TipocrimeTable extends Table
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

        $this->setTable('tipocrime');
        $this->setDisplayField('tipocrime');
        $this->setPrimaryKey('id');

        $this->hasMany('Crimes', [
            'foreignKey' => 'tipocrime_id'
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
            ->scalar('descricao')
            ->maxLength('descricao', 45)
            ->allowEmpty('descricao');

        return $validator;
    }
}
