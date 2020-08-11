<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CodigosPostaisFixture
 *
 */
class CodigosPostaisFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'CodigoDistrito' => ['type' => 'tinyinteger', 'length' => 2, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'CodigoConcelho' => ['type' => 'smallinteger', 'length' => 6, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'CodigoLocalidade' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'NomeLocalidade' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'CodigoArteria' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'ArteriaTipo' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'PrimeiraPreposicao' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'ArteriaTitulo' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'SegundaPreposicao' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'ArteriaDesignacao' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'ArteriaInformacaoLocal' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'ArteriaDescricaoTroco' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'NumeroDePortaCliente' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'NomeCliente' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'NumCodigoPostal' => ['type' => 'string', 'fixed' => true, 'length' => 4, 'null' => false, 'default' => '', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'ExtCodigoPostal' => ['type' => 'string', 'fixed' => true, 'length' => 3, 'null' => false, 'default' => '', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'DesigPostal' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => '', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'Latitude' => ['type' => 'decimal', 'length' => 10, 'precision' => 8, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'Longitude' => ['type' => 'decimal', 'length' => 11, 'precision' => 8, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        '_indexes' => [
            'DistritoPostal' => ['type' => 'index', 'columns' => ['CodigoDistrito'], 'length' => []],
            'ConcelhoPostal' => ['type' => 'index', 'columns' => ['CodigoConcelho'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'ConcelhoPostal' => ['type' => 'foreign', 'columns' => ['CodigoConcelho'], 'references' => ['concelhos', 'CodigoConcelho'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'DistritoPostal' => ['type' => 'foreign', 'columns' => ['CodigoDistrito'], 'references' => ['distritos', 'CodigoDistrito'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'CodigoDistrito' => 1,
                'CodigoConcelho' => 1,
                'CodigoLocalidade' => 1,
                'NomeLocalidade' => 'Lorem ipsum dolor sit amet',
                'CodigoArteria' => 1,
                'ArteriaTipo' => 'Lorem ipsum dolor sit amet',
                'PrimeiraPreposicao' => 'Lorem ipsum dolor sit amet',
                'ArteriaTitulo' => 'Lorem ipsum dolor sit amet',
                'SegundaPreposicao' => 'Lorem ipsum dolor sit amet',
                'ArteriaDesignacao' => 'Lorem ipsum dolor sit amet',
                'ArteriaInformacaoLocal' => 'Lorem ipsum dolor sit amet',
                'ArteriaDescricaoTroco' => 'Lorem ipsum dolor sit amet',
                'NumeroDePortaCliente' => 'Lorem ipsum dolor sit amet',
                'NomeCliente' => 'Lorem ipsum dolor sit amet',
                'NumCodigoPostal' => 'Lo',
                'ExtCodigoPostal' => 'L',
                'DesigPostal' => 'Lorem ipsum dolor sit amet',
                'Latitude' => 1.5,
                'Longitude' => 1.5
            ],
        ];
        parent::init();
    }
}
