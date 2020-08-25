<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Crime Entity
 *
 * @property int $id
 * @property string $descricao
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $processo_id
 * @property string $ocorrencia
 * @property string $registo
 * @property int $qte
 * @property string $apenaspre
 *
 * @property \App\Model\Entity\Processo $processo
 * @property \App\Model\Entity\Pessoa[] $pessoas
 * @property \App\Model\Entity\PessoasCrime[] $pessoas_crimes
 */
class Crime extends Entity
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
        'descricao' => true,
        'created' => true,
        'modified' => true,
        'processo_id' => true,
        'ocorrencia' => true,
        'registo' => true,
        'qte' => true,
        'apenaspre' => true,
        'processo' => true,
        'pessoas' => true,
        'pessoas_crimes' => true
    ];
}
