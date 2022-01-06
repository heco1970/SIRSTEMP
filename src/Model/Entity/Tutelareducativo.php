<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tutelareducativo Entity
 *
 * @property int $id
 * @property int $id_pedido
 * @property int $id_equipa
 * @property string $nome_jovem
 * @property int $nif
 * @property \Cake\I18n\FrozenDate $data_nascimento
 * @property string $designacao_entidade
 * @property \Cake\I18n\FrozenDate $data_inicio
 */
class Tutelareducativo extends Entity
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
        'id_pedido' => true,
        'id_equipa' => true,
        'nome_jovem' => true,
        'nif' => true,
        'data_nascimento' => true,
        'designacao_entidade' => true,
        'data_inicio' => true,
        'team' => true,
        'pedido' => true
    ];
}
