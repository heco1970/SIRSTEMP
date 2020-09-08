<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Natureza Entity
 *
 * @property int $id
 * @property string $designacao
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Processo[] $processos
 */
class Natureza extends Entity
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
        'designacao' => true,
        'created' => true,
        'modified' => true,
        'processos' => true
    ];
}