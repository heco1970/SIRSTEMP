<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Attempt Entity
 *
 * @property int $id
 * @property string $username
 * @property int|null $count
 * @property \Cake\I18n\FrozenTime|null $suspenso
 * @property int $user_states_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\UserState $user_state
 */
class Attempt extends Entity
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
        'username' => true,
        'count' => true,
        'suspenso' => true,
        'user_states_id' => true,
        'created' => true,
        'modified' => true,
        'user_state' => true
    ];
}
