<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Processo Entity
 *
 * @property int $id
 * @property int $entidadejudiciai_id
 * @property int $unit_id
 * @property string $natureza
 * @property string $nip
 * @property string $observacoes
 * @property \Cake\I18n\FrozenDate $dataconclusao
 * @property int $state_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Unit $unit
 * @property \App\Model\Entity\State $state
 */
class Processo extends Entity
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
        'entidadejudiciai_id' => true,
        'unit_id' => true,
        'natureza' => true,
        'nip' => true,
        'observacoes' => true,
        'dataconclusao' => true,
        'state_id' => true,
        'created' => true,
        'modified' => true,
        'unit' => true,
        'state' => true
    ];
}
