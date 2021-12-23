<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Fatura Entity
 *
 * @property int $id
 * @property string $num_fatura
 * @property int $nip
 * @property int $id_entidade
 * @property int $id_unidade
 * @property \Cake\I18n\FrozenDate $data_emissao
 * @property string $valor
 * @property \Cake\I18n\FrozenDate $data_pagamento
 * @property string $ref_pagamento
 * @property string $ultima_alteracao
 * @property string $utilizador
 * @property int $id_pagamento
 * @property string|null $observacoes
 * @property string $referencia
 * @property \Cake\I18n\FrozenDate $data
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
        'num_fatura' => true,
        'nip' => true,
        'id_entidade' => true,
        'id_unidade' => true,
        'data_emissao' => true,
        'valor' => true,
        'data_pagamento' => true,
        'ref_pagamento' => true,
        'ultima_alteracao' => true,
        'utilizador' => true,
        'id_pagamento' => true,
        'observacoes' => true,
        'referencia' => true,
        'data' => true
    ];
}
