<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pedido Entity
 *
 * @property int $id
 * @property int $processo_id
 * @property int $pessoa_id
 * @property string $referencia
 * @property string $canalentrada
 * @property \Cake\I18n\FrozenDate $datarecepcao
 * @property string|null $origem
 * @property int $pedidostype_id
 * @property int $team_id
 * @property int $state_id
 * @property \Cake\I18n\FrozenDate $termino
 * @property int $numeropedido
 * @property \Cake\I18n\FrozenDate $datacriacao
 * @property \Cake\I18n\FrozenDate $dataatribuicao
 * @property \Cake\I18n\FrozenDate $datainicioefectivo
 * @property \Cake\I18n\FrozenDate $datatermoprevisto
 * @property \Cake\I18n\FrozenDate $dataefectivatermo
 * @property int $pedidosmotive_id
 * @property int $pais_id
 * @property int|null $concelho_id
 * @property string|null $transferencias
 * @property string $gestor
 * @property string|null $seguro
 * @property string $periocidaderelatorios
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property string|null $fatura
 * @property string|null $establecimentopricional
 * @property string|null $centroeducativo
 * @property int|null $codigos_postai_id
 * @property int|null $designacao
 * @property string|null $descricao
 *
 * @property \App\Model\Entity\Processo $processo
 * @property \App\Model\Entity\Pessoa $pessoa
 * @property \App\Model\Entity\Pedidostype $pedidostype
 * @property \App\Model\Entity\Team $team
 * @property \App\Model\Entity\State $state
 * @property \App\Model\Entity\Pedidosmotive $pedidosmotive
 * @property \App\Model\Entity\Pai $pai
 * @property \App\Model\Entity\Concelho $concelho
 * @property \App\Model\Entity\CodigosPostai $codigos_postai
 * @property \App\Model\Entity\Verbete[] $verbetes
 */
class Pedido extends Entity
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
        'processo_id' => true,
        'pessoa_id' => true,
        'referencia' => true,
        'canalentrada' => true,
        'datarecepcao' => true,
        'origem' => true,
        'pedidostype_id' => true,
        'team_id' => true,
        'state_id' => true,
        'termino' => true,
        'numeropedido' => true,
        'datacriacao' => true,
        'dataatribuicao' => true,
        'datainicioefectivo' => true,
        'datatermoprevisto' => true,
        'dataefectivatermo' => true,
        'pedidosmotive_id' => true,
        'pais_id' => true,
        'concelho_id' => true,
        'transferencias' => true,
        'gestor' => true,
        'seguro' => true,
        'periocidaderelatorios' => true,
        'created' => true,
        'modified' => true,
        'fatura' => true,
        'establecimentopricional' => true,
        'centroeducativo' => true,
        'codigos_postai_id' => true,
        'designacao' => true,
        'descricao' => true,
        'processo' => true,
        'pessoa' => true,
        'pedidostype' => true,
        'team' => true,
        'state' => true,
        'pedidosmotive' => true,
        'pai' => true,
        'concelho' => true,
        'codigos_postai' => true,
        'verbetes' => true
    ];
}
