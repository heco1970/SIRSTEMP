<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tipocrime Entity
 *
 * @property int $id
 * @property string $descricao
 * @property string $created
 * @property string $modified
 *
 * @property \App\Model\Entity\Crime[] $crimes
 */
class Tipocrime extends Entity
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
        'crimes' => true
    ];
}
