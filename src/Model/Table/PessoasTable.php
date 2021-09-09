<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pessoas Model
 *
 * @property \App\Model\Table\EstadocivilsTable|\Cake\ORM\Association\BelongsTo $Estadocivils
 * @property \App\Model\Table\GenerosTable|\Cake\ORM\Association\BelongsTo $Generos
 * @property \App\Model\Table\PaisTable|\Cake\ORM\Association\BelongsTo $Pais
 * @property \App\Model\Table\CodigosPostaisTable|\Cake\ORM\Association\BelongsTo $CodigosPostais
 * @property \App\Model\Table\CentroEducsTable|\Cake\ORM\Association\BelongsTo $CentroEducs
 * @property \App\Model\Table\EstbPrisTable|\Cake\ORM\Association\BelongsTo $EstbPris
 * @property \App\Model\Table\UnidadeoperasTable|\Cake\ORM\Association\BelongsTo $Unidadeoperas
 * @property \App\Model\Table\ContactosTable|\Cake\ORM\Association\HasMany $Contactos
 * @property \App\Model\Table\CrimesTable|\Cake\ORM\Association\HasMany $Crimes
 * @property \App\Model\Table\PedidosTable|\Cake\ORM\Association\HasMany $Pedidos
 * @property \App\Model\Table\ProcessosTable|\Cake\ORM\Association\BelongsToMany $Processos
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

        $this->belongsTo('Estadocivils', [
            'foreignKey' => 'estadocivil_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Generos', [
            'foreignKey' => 'genero_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Pais', [
            'foreignKey' => 'pai_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('CodigosPostais', [
            'foreignKey' => 'codigos_postai_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('CentroEducs', [
            'foreignKey' => 'centro_educ_id'
        ]);
        $this->belongsTo('EstbPris', [
            'foreignKey' => 'estb_pri_id'
        ]);
        $this->belongsTo('Unidadeoperas', [
            'foreignKey' => 'unidadeopera_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Contactos', [
            'foreignKey' => 'pessoa_id'
        ]);
        $this->hasMany('Crimes', [
            'foreignKey' => 'pessoa_id'
        ]);
        $this->hasMany('Pedidos', [
            'foreignKey' => 'pessoa_id'
        ]);
        $this->belongsToMany('Processos', [
            'foreignKey' => 'pessoa_id',
            'targetForeignKey' => 'processo_id',
            'joinTable' => 'pessoas_processos'
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
            ->scalar('nome')
            ->maxLength('nome', 255)
            ->requirePresence('nome', 'create')
            ->notEmpty('nome');

        $validator
            ->scalar('nome_alt')
            ->maxLength('nome_alt', 255)
            ->requirePresence('nome_alt', 'create')
            ->notEmpty('nome_alt');

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
            ->maxLength('cc', 9)
            ->requirePresence('cc', 'create')
            ->notEmpty('cc');

        $validator
            ->integer('nif')
            ->minLength('nif', 9)
            ->maxLength('nif', 9)
            ->requirePresence('nif', 'create')
            ->notEmpty('nif');

        $validator
            ->scalar('outroidentifica')
            ->maxLength('outroidentifica', 255)
            ->allowEmpty('outroidentifica');

        $validator
            ->boolean('estado')
            ->requirePresence('estado', 'create')
            ->notEmpty('estado');

        $validator
            ->scalar('observacoes')
            ->maxLength('observacoes', 255)
            ->allowEmpty('observacoes');

        $validator
            ->scalar('morada')
            ->maxLength('morada', 200)
            ->allowEmpty('morada');

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
        $rules->add($rules->isUnique(['nome'], 'Nome já existente nos registos.'));
        $rules->add($rules->existsIn(['estadocivil_id'], 'Estadocivils'));
        $rules->add($rules->existsIn(['genero_id'], 'Generos'));
        $rules->add($rules->existsIn(['pai_id'], 'Pais'));
        $rules->add($rules->existsIn(['codigos_postai_id'], 'CodigosPostais'));
        $rules->add($rules->existsIn(['centro_educ_id'], 'CentroEducs'));
        $rules->add($rules->existsIn(['estb_pri_id'], 'EstbPris'));
        $rules->add($rules->existsIn(['unidadeopera_id'], 'Unidadeoperas'));

        return $rules;
    }
}
