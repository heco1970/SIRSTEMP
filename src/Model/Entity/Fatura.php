<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Fatura Entity
 *
 * @property int $id
 * @property int $id_entidade
 * @property int $id_unidade
 * @property int $id_pagamento
 * @property int $num_fatura
 * @property int $nip
 * @property \Cake\I18n\FrozenDate $data_emissao
 * @property float $valor
 * @property \Cake\I18n\FrozenDate $data_pagamento
 * @property string $ref_pagamento
 * @property \Cake\I18n\FrozenTime $ultima_alteracao
 * @property string $utilizador
 * @property string|null $observacoes
 * @property string $referencia
 * @property \Cake\I18n\FrozenDate $data
 *
 * @property \App\Model\Entity\Entidadejudiciai $entidadejudiciai
 * @property \App\Model\Entity\Unit $unit
 * @property \App\Model\Entity\Pagamento $pagamento
 */
class Fatura extends Entity
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
        'id_entidade' => true,
        'id_unidade' => true,
        'id_pagamento' => true,
        'num_fatura' => true,
        'nip' => true,
        'data_emissao' => true,
        'valor' => true,
        'data_pagamento' => true,
        'ref_pagamento' => true,
        'ultima_alteracao' => true,
        'utilizador' => true,
        'observacoes' => true,
        'referencia' => true,
        'data' => true,
        'entidadejudiciai' => true,
        'unit' => true,
        'pagamento' => true
    ];
}
