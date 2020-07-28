<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property int|null $type_id
 * @property string|null $username
 * @property string|null $password
 * @property string $name
 * @property string $email
 * @property $photo
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Type $type
 * @property \App\Model\Entity\Access[] $accesses
 * @property \App\Model\Entity\Team[] $teams
 * @property \App\Model\Entity\User[] $users
 */
class User extends Entity
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
        'type_id' => true,
        'username' => true,
        'password' => true,
        'name' => true,
        'email' => true,
        'photo' => true,
        'created' => true,
        'modified' => true,
        'type' => true,
        'accesses' => true,
        'teams' => true,
        'users' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}
