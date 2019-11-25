<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pessoa Entity
 *
 * @property int $id
 * @property string $nome
 * @property \Cake\I18n\FrozenDate $data_nascimento
 * @property string $nomepai
 * @property string $nomemae
 * @property int $id_estadocivil
 * @property int $id_genero
 * @property int $pais_id
 * @property string $cc
 * @property int $nif
 * @property string $outroidentifica
 * @property int $id_unidadeopera
 * @property bool $estado
 * @property string $observacoes
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Pai $pai
 */
class Pessoa extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'nome' => true,
        'data_nascimento' => true,
        'nomepai' => true,
        'nomemae' => true,
        'id_estadocivil' => true,
        'id_genero' => true,
        'pais_id' => true,
        'cc' => true,
        'nif' => true,
        'outroidentifica' => true,
        'id_unidadeopera' => true,
        'estado' => true,
        'observacoes' => true,
        'created' => true,
        'modified' => true,
        'pai' => true
    ];
}
