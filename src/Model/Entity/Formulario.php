<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Formulario Entity
 *
 * @property int $id
 * @property int $id_equipa
 * @property int $id_pedido
 * @property string $dr_ds
 * @property string $nome_prestador_trabalho
 * @property string $designacao_entidade
 * @property int $hora_aplicadas
 * @property int $hora_prestadas
 * @property string $actividade_exercida
 * @property \Cake\I18n\FrozenDate $data_fim_execucao
 * @property \Cake\I18n\FrozenDate $data
 * @property string $tecnico
 */
class Formulario extends Entity
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
        'id_equipa' => true,
        'id_pedido' => true,
        'dr_ds' => true,
        'nome_prestador_trabalho' => true,
        'designacao_entidade' => true,
        'hora_aplicadas' => true,
        'hora_prestadas' => true,
        'actividade_exercida' => true,
        'data_fim_execucao' => true,
        'data' => true,
        'tecnico' => true,
        'team' => true,
        'pedido' => true
    ];
}
