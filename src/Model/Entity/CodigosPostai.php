<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CodigosPostai Entity
 *
 * @property int $id
 * @property int $CodigoDistrito
 * @property int $CodigoConcelho
 * @property int|null $CodigoLocalidade
 * @property string|null $NomeLocalidade
 * @property int|null $CodigoArteria
 * @property string|null $ArteriaTipo
 * @property string|null $PrimeiraPreposicao
 * @property string|null $ArteriaTitulo
 * @property string|null $SegundaPreposicao
 * @property string|null $ArteriaDesignacao
 * @property string|null $ArteriaInformacaoLocal
 * @property string|null $ArteriaDescricaoTroco
 * @property string|null $NumeroDePortaCliente
 * @property string|null $NomeCliente
 * @property string $NumCodigoPostal
 * @property string $ExtCodigoPostal
 * @property string $DesigPostal
 * @property float|null $Latitude
 * @property float|null $Longitude
 */
class CodigosPostai extends Entity
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
        'CodigoDistrito' => true,
        'CodigoConcelho' => true,
        'CodigoLocalidade' => true,
        'NomeLocalidade' => true,
        'CodigoArteria' => true,
        'ArteriaTipo' => true,
        'PrimeiraPreposicao' => true,
        'ArteriaTitulo' => true,
        'SegundaPreposicao' => true,
        'ArteriaDesignacao' => true,
        'ArteriaInformacaoLocal' => true,
        'ArteriaDescricaoTroco' => true,
        'NumeroDePortaCliente' => true,
        'NomeCliente' => true,
        'NumCodigoPostal' => true,
        'ExtCodigoPostal' => true,
        'DesigPostal' => true,
        'Latitude' => true,
        'Longitude' => true
    ];
}
