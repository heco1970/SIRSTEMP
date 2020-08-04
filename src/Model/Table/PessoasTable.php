<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pessoas Model
 *
 * @property \App\Model\Table\PaisTable|\Cake\ORM\Association\BelongsTo $Pais
 * @property |\Cake\ORM\Association\BelongsTo $CentroEducs
 * @property \App\Model\Table\EstbPrisTable|\Cake\ORM\Association\BelongsTo $EstbPris
 * @property \App\Model\Table\ContactosTable|\Cake\ORM\Association\HasMany $Contactos
 * @property \App\Model\Table\PedidosTable|\Cake\ORM\Association\HasMany $Pedidos
 * @property \App\Model\Table\VerbetesTable|\Cake\ORM\Association\HasMany $Verbetes
 * @property \App\Model\Table\CrimesTable|\Cake\ORM\Association\BelongsToMany $Crimes
 *
 * @method \App\Model\Entity\Pessoa get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pessoa newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Pessoa[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pessoa|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pessoa|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pessoa patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pessoa[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pessoa findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PessoasTable extends Table
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

        $this->setTable('pessoas');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Pais', [
            'foreignKey' => 'pais_id',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('CentroEducs', [
            'foreignKey' => 'centro_educs_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('EstbPris', [
            'foreignKey' => 'estb_pris_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Estadocivils', [
            'foreignKey' => 'id_estadocivil',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Generos', [
            'foreignKey' => 'id_genero',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Unidadeoperas', [
            'foreignKey' => 'id_unidadeopera',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Contactos', [
            'foreignKey' => 'pessoa_id'
        ]);
        $this->hasMany('Pedidos', [
            'foreignKey' => 'pessoa_id'
        ]);
        $this->hasMany('Verbetes', [
            'foreignKey' => 'pessoa_id'
        ]);
        $this->belongsToMany('Crimes', [
            'foreignKey' => 'pessoa_id',
            'targetForeignKey' => 'crime_id',
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('nome')
            ->maxLength('nome', 255)
            ->requirePresence('nome', 'create')
            ->notEmpty('nome');

        $validator
            ->date('data_nascimento')
            ->requirePresence('data_nascimento', 'create')
            ->notEmpty('data_nascimento');

        $validator
            ->scalar('nomepai')
            ->maxLength('nomepai', 255)
            ->requirePresence('nomepai', 'create')
            ->notEmpty('nomepai');

        $validator
            ->scalar('nomemae')
            ->maxLength('nomemae', 255)
            ->requirePresence('nomemae', 'create')
            ->notEmpty('nomemae');

        

        $validator
            ->scalar('cc')
            ->maxLength('cc', 10)
            ->requirePresence('cc', 'create')
            ->notEmpty('cc');

        $validator
            ->integer('nif')
            ->requirePresence('nif', 'create')
            ->notEmpty('nif');

        $validator
            ->scalar('outroidentifica')
            ->maxLength('outroidentifica', 255)
            ->requirePresence('outroidentifica', 'create')
            ->notEmpty('outroidentifica');

       

        $validator
            ->scalar('distrito')
            ->maxLength('distrito', 255)
            ->requirePresence('distrito', 'create')
            ->notEmpty('distrito');

        $validator
            ->scalar('concelho')
            ->maxLength('concelho', 255)
            ->requirePresence('concelho', 'create')
            ->notEmpty('concelho');

        $validator
            ->scalar('freguesia')
            ->maxLength('freguesia', 255)
            ->requirePresence('freguesia', 'create')
            ->notEmpty('freguesia');

        $validator
            ->scalar('nome_alt')
            ->maxLength('nome_alt', 100)
            ->requirePresence('nome_alt', 'create')
            ->notEmpty('nome_alt');

        $validator
            ->boolean('estado')
            ->requirePresence('estado', 'create')
            ->notEmpty('estado');

        $validator
            ->scalar('observacoes')
            ->maxLength('observacoes', 255)
            ->requirePresence('observacoes', 'create')
            ->notEmpty('observacoes');

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
        $rules->add($rules->isUnique(['nome','data_nascimento'], 'Já existe um registo com o mesmo nome e data de nascimento.'));
        $rules->add($rules->isUnique(['nome'], 'Já existe um registo com o mesmo nome.'));
        $rules->add($rules->existsIn(['pais_id'], 'Pais'));
        $rules->add($rules->existsIn(['id_estadocivil'], 'Estadocivils'));
        $rules->add($rules->existsIn(['id_genero'], 'Generos'));
        $rules->add($rules->existsIn(['id_unidadeopera'], 'Unidadeoperas'));
        $rules->add($rules->existsIn(['centro_educs_id'], 'CentroEducs'));
        $rules->add($rules->existsIn(['estb_pris_id'], 'EstbPris'));

        return $rules;
    }
}
