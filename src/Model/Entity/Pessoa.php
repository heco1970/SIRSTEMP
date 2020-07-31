<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pessoa Entity
 *
 * @property int $id
 * @property string $nome
 * @property \Cake\I18n\FrozenDate $data_nascimento
 * @property string $nomepai
 * @property string $nomemae
 * @property int $id_estadocivil
 * @property int $id_genero
 * @property int $pais_id
 * @property string $cc
 * @property int $nif
 * @property string $outroidentifica
 * @property int $id_unidadeopera
 * @property string $distrito
 * @property string $concelho
 * @property string $freguesia
 * @property string $centro_edu
 * @property string $estb_pri
 * @property string $nome_alt
 * @property bool $estado
 * @property string $observacoes
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Pai $pai
 * @property \App\Model\Entity\Contacto[] $contactos
 * @property \App\Model\Entity\Pedido[] $pedidos
 * @property \App\Model\Entity\Verbete[] $verbetes
 * @property \App\Model\Entity\Crime[] $crimes
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
        'data_nascimento' => true,
        'nomepai' => true,
        'nomemae' => true,
        'id_estadocivil' => true,
        'id_genero' => true,
        'pais_id' => true,
        'cc' => true,
        'nif' => true,
        'outroidentifica' => true,
        'id_unidadeopera' => true,
        'distrito' => true,
        'concelho' => true,
        'freguesia' => true,
        'centro_edu' => true,
        'estb_pri' => true,
        'nome_alt' => true,
        'estado' => true,
        'observacoes' => true,
        'created' => true,
        'modified' => true,
        'pai' => true,
        'contactos' => true,
        'pedidos' => true,
        'verbetes' => true,
        'crimes' => true
    ];
}
