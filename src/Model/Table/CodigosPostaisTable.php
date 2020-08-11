<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CodigosPostais Model
 *
 * @method \App\Model\Entity\CodigosPostai get($primaryKey, $options = [])
 * @method \App\Model\Entity\CodigosPostai newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CodigosPostai[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CodigosPostai|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CodigosPostai|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CodigosPostai patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CodigosPostai[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CodigosPostai findOrCreate($search, callable $callback = null, $options = [])
 */
class CodigosPostaisTable extends Table
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

        $this->setTable('codigos_postais');
        $this->setDisplayField('id');
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
            ->nonNegativeInteger('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('CodigoDistrito', 'create')
            ->notEmpty('CodigoDistrito');

        $validator
            ->requirePresence('CodigoConcelho', 'create')
            ->notEmpty('CodigoConcelho');

        $validator
            ->integer('CodigoLocalidade')
            ->allowEmpty('CodigoLocalidade');

        $validator
            ->scalar('NomeLocalidade')
            ->maxLength('NomeLocalidade', 255)
            ->allowEmpty('NomeLocalidade');

        $validator
            ->integer('CodigoArteria')
            ->allowEmpty('CodigoArteria');

        $validator
            ->scalar('ArteriaTipo')
            ->maxLength('ArteriaTipo', 255)
            ->allowEmpty('ArteriaTipo');

        $validator
            ->scalar('PrimeiraPreposicao')
            ->maxLength('PrimeiraPreposicao', 255)
            ->allowEmpty('PrimeiraPreposicao');

        $validator
            ->scalar('ArteriaTitulo')
            ->maxLength('ArteriaTitulo', 255)
            ->allowEmpty('ArteriaTitulo');

        $validator
            ->scalar('SegundaPreposicao')
            ->maxLength('SegundaPreposicao', 255)
            ->allowEmpty('SegundaPreposicao');

        $validator
            ->scalar('ArteriaDesignacao')
            ->maxLength('ArteriaDesignacao', 255)
            ->allowEmpty('ArteriaDesignacao');

        $validator
            ->scalar('ArteriaInformacaoLocal')
            ->maxLength('ArteriaInformacaoLocal', 255)
            ->allowEmpty('ArteriaInformacaoLocal');

        $validator
            ->scalar('ArteriaDescricaoTroco')
            ->maxLength('ArteriaDescricaoTroco', 255)
            ->allowEmpty('ArteriaDescricaoTroco');

        $validator
            ->scalar('NumeroDePortaCliente')
            ->maxLength('NumeroDePortaCliente', 255)
            ->allowEmpty('NumeroDePortaCliente');

        $validator
            ->scalar('NomeCliente')
            ->maxLength('NomeCliente', 255)
            ->allowEmpty('NomeCliente');

        $validator
            ->scalar('NumCodigoPostal')
            ->maxLength('NumCodigoPostal', 4)
            ->requirePresence('NumCodigoPostal', 'create')
            ->notEmpty('NumCodigoPostal');

        $validator
            ->scalar('ExtCodigoPostal')
            ->maxLength('ExtCodigoPostal', 3)
            ->requirePresence('ExtCodigoPostal', 'create')
            ->notEmpty('ExtCodigoPostal');

        $validator
            ->scalar('DesigPostal')
            ->maxLength('DesigPostal', 255)
            ->requirePresence('DesigPostal', 'create')
            ->notEmpty('DesigPostal');

        $validator
            ->decimal('Latitude')
            ->allowEmpty('Latitude');

        $validator
            ->decimal('Longitude')
            ->allowEmpty('Longitude');

        return $validator;
    }
}
