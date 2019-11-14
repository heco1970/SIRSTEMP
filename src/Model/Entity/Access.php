<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Access Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $browser
 * @property string|null $browser_version
 * @property string|null $os
 * @property string|null $os_version
 * @property string|null $device
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\User $user
 */
class Access extends Entity
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
        'user_id' => true,
        'browser' => true,
        'browser_version' => true,
        'os' => true,
        'os_version' => true,
        'device' => true,
        'created' => true,
        'user' => true
    ];
}
