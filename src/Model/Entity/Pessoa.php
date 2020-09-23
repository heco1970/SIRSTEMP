<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pessoa Entity
 *
 * @property int $id
 * @property string $nome
 * @property string $nome_alt
 * @property \Cake\I18n\FrozenDate $data_nascimento
 * @property string $nomepai
 * @property string $nomemae
 * @property int $estadocivil_id
 * @property int $genero_id
 * @property int $pai_id
 * @property int $codigos_postai_id
 * @property int|null $centro_educ_id
 * @property int|null $estb_pri_id
 * @property string $cc
 * @property int $nif
 * @property string|null $outroidentifica
 * @property int $unidadeopera_id
 * @property bool $estado
 * @property string|null $observacoes
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Estadocivil $estadocivil
 * @property \App\Model\Entity\Genero $genero
 * @property \App\Model\Entity\Pai $pai
 * @property \App\Model\Entity\CodigosPostai $codigos_postai
 * @property \App\Model\Entity\Concelho $concelho
 * @property \App\Model\Entity\CentroEduc $centro_educ
 * @property \App\Model\Entity\EstbPri $estb_pri
 * @property \App\Model\Entity\Unidadeopera $unidadeopera
 * @property \App\Model\Entity\Contacto[] $contactos
 * @property \App\Model\Entity\Crime[] $crimes
 * @property \App\Model\Entity\Pedido[] $pedidos
 * @property \App\Model\Entity\Processo[] $processos
 */
class Pessoa extends Entity
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
        'nome' => true,
        'nome_alt' => true,
        'data_nascimento' => true,
        'nomepai' => true,
        'nomemae' => true,
        'estadocivil_id' => true,
        'genero_id' => true,
        'pai_id' => true,
        'codigos_postai_id' => true,
        'centro_educ_id' => true,
        'estb_pri_id' => true,
        'cc' => true,
        'nif' => true,
        'outroidentifica' => true,
        'unidadeopera_id' => true,
        'estado' => true,
        'observacoes' => true,
        'created' => true,
        'modified' => true,
        'estadocivil' => true,
        'genero' => true,
        'pai' => true,
        'codigos_postai' => true,
        'concelho' => true,
        'centro_educ' => true,
        'estb_pri' => true,
        'unidadeopera' => true,
        'contactos' => true,
        'crimes' => true,
        'pedidos' => true,
        'processos' => true
    ];
}
