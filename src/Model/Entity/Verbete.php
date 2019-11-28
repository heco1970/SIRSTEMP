<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Verbete Entity
 *
 * @property int $id
 * @property int $pessoa_id
 * @property string $nip
 * @property \Cake\I18n\FrozenDate $datacriacao
 * @property \Cake\I18n\FrozenDate $datadistribuicao
 * @property \Cake\I18n\FrozenDate $datainicioefectiva
 * @property \Cake\I18n\FrozenDate $dataefectivatermino
 * @property \Cake\I18n\FrozenDate $datainiciop
 * @property \Cake\I18n\FrozenDate $dataprevistat
 * @property string $ep
 * @property string $observacoes
 * @property int $estado_id
 * @property string $motivo
 * @property string $concluidof
 * @property int $pedido_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
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
        'pessoa_id' => true,
        'nip' => true,
        'datacriacao' => true,
        'datadistribuicao' => true,
        'datainicioefectiva' => true,
        'dataefectivatermino' => true,
        'datainiciop' => true,
        'dataprevistat' => true,
        'ep' => true,
        'observacoes' => true,
        'estado_id' => true,
        'motivo' => true,
        'concluidof' => true,
        'pedido_id' => true,
        'created' => true,
        'modified' => true,
        'pessoa' => true,
        'estado' => true,
        'pedido' => true
    ];
}
