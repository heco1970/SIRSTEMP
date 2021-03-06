<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Perfis Model
 *
 * @property \App\Model\Table\UserPerfisTable|\Cake\ORM\Association\HasMany $UserPerfis
 *
 * @method \App\Model\Entity\Perfi get($primaryKey, $options = [])
 * @method \App\Model\Entity\Perfi newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Perfi[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Perfi|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Perfi|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Perfi patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Perfi[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Perfi findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PerfisTable extends Table
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

        $this->setTable('perfis');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Users', [
            'foreignKey' => 'perfi_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'user_perfis'
        ]);

        $this->hasMany('UserPerfis', [
            'foreignKey' => 'perfi_id'
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
            ->scalar('perfil')
            ->maxLength('perfil', 255)
            ->requirePresence('perfil', 'create')
            ->notEmpty('perfil');

        return $validator;
    }
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['perfil'], 'J?? existe um perfil com a mesma designa????o.'));
        return $rules;
    }
}
