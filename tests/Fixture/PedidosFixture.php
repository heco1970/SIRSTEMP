<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PedidosFixture
 *
 */
class PedidosFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'processo_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'pessoa_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'referencia' => ['type' => 'string', 'length' => 20, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'canalentrada' => ['type' => 'string', 'length' => 20, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'datarecepcao' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'origem' => ['type' => 'string', 'length' => 20, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'pedidostypes_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'team_id' => ['type' => 'integer', 'length' => 20, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'state_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'termino' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'numeropedido' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'datacriacao' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'dataatribuicao' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'datainicioefectivo' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'datatermoprevisto' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'dataefectivatermo' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'pedidosmotives_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'pais_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'concelho' => ['type' => 'string', 'length' => 45, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'transferencias' => ['type' => 'string', 'length' => 45, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'gestor' => ['type' => 'string', 'length' => 45, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'seguro' => ['type' => 'string', 'length' => 45, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'periocidaderelatorios' => ['type' => 'string', 'length' => 45, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'timestamp', 'length' => null, 'null' => false, 'default' => 'current_timestamp()', 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'timestamp', 'length' => null, 'null' => false, 'default' => '0000-00-00 00:00:00', 'comment' => '', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_general_ci'
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
                'processo_id' => 1,
                'pessoa_id' => 1,
                'referencia' => 'Lorem ipsum dolor ',
                'canalentrada' => 'Lorem ipsum dolor ',
                'datarecepcao' => '2020-08-25',
                'origem' => 'Lorem ipsum dolor ',
                'pedidostypes_id' => 1,
                'team_id' => 1,
                'state_id' => 1,
                'termino' => '2020-08-25',
                'numeropedido' => 1,
                'datacriacao' => '2020-08-25',
                'dataatribuicao' => '2020-08-25',
                'datainicioefectivo' => '2020-08-25',
                'datatermoprevisto' => '2020-08-25',
                'dataefectivatermo' => '2020-08-25',
                'pedidosmotives_id' => 1,
                'pais_id' => 1,
                'concelho' => 'Lorem ipsum dolor sit amet',
                'transferencias' => 'Lorem ipsum dolor sit amet',
                'gestor' => 'Lorem ipsum dolor sit amet',
                'seguro' => 'Lorem ipsum dolor sit amet',
                'periocidaderelatorios' => 'Lorem ipsum dolor sit amet',
                'created' => 1598355245,
                'modified' => 1598355245
            ],
        ];
        parent::init();
    }
}
