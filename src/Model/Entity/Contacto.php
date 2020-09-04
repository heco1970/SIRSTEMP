<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Contacto Entity
 *
 * @property int $id
 * @property int $pessoa_id
 * @property string $nome
 * @property string $localidade
 * @property int $pais_id
 * @property string $morada
 * @property int|null $telefone
 * @property int|null $fax
 * @property int|null $telemovel
 * @property string $email
 * @property string|null $descricao
 * @property int $estado
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Pessoa $pessoa
 */
class Contacto extends Entity
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
        'pessoa_id' => true,
        'nome' => true,
        'localidade' => true,
        'pais_id' => true,
        'morada' => true,
        'telefone' => true,
        'fax' => true,
        'telemovel' => true,
        'email' => true,
        'descricao' => true,
        'estado' => true,
        'created' => true,
        'modified' => true,
        'pessoa' => true
    ];
}
