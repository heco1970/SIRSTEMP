<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Verbete Entity
 *
 * @property int $id_verbetes
 * @property string $equipa
 * @property string $dr_ds
 * @property string $nome
 * @property string $designacao
 * @property \Cake\I18n\FrozenTime $hora_aplicada
 * @property \Cake\I18n\FrozenTime $hora_prevista
 * @property string $actividade
 * @property \Cake\I18n\FrozenTime $data_fim_execucao
 * @property \Cake\I18n\FrozenTime $data
 * @property string $tecnico
 *
 * @property \App\Model\Entity\Pessoa $pessoa
 * @property \App\Model\Entity\Estado $estado
 * @property \App\Model\Entity\Pedido $pedido
 */
class Verbete extends Entity
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
        'equipa' => true,
        'dr_ds' => true,
        'nome' => true,
        'designacao' => true,
        'hora_aplicada' => true,
        'hora_prevista' => true,
        'actividade' => true,
        'data_fim_execucao' => true,
        'data' => true,
        'tecnico' => true,
        'pessoa' => true,
        'estado' => true,
        'pedido' => true
    ];
}
