<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FaturasFixture
 *
 */
class FaturasFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'id_entidade' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_unidade' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_pagamento' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'num_fatura' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'nip' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'data_emissao' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'valor' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'data_pagamento' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'ref_pagamento' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'ultima_alteracao' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'utilizador' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'observacoes' => ['type' => 'string', 'length' => 200, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_unicode_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'referencia' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'data' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_faturas_1_idx' => ['type' => 'index', 'columns' => ['id_entidade'], 'length' => []],
            'fk_faturas_2_idx' => ['type' => 'index', 'columns' => ['id_unidade'], 'length' => []],
            'fk_faturas_3_idx' => ['type' => 'index', 'columns' => ['id_pagamento'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'id_UNIQUE' => ['type' => 'unique', 'columns' => ['id'], 'length' => []],
            'fk_faturas_1' => ['type' => 'foreign', 'columns' => ['id_entidade'], 'references' => ['entidadejudiciais', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_faturas_2' => ['type' => 'foreign', 'columns' => ['id_unidade'], 'references' => ['units', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_faturas_3' => ['type' => 'foreign', 'columns' => ['id_pagamento'], 'references' => ['pagamentos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_unicode_ci'
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
                'id_entidade' => 1,
                'id_unidade' => 1,
                'id_pagamento' => 1,
                'num_fatura' => 1,
                'nip' => 1,
                'data_emissao' => '2021-12-23',
                'valor' => 1,
                'data_pagamento' => '2021-12-23',
                'ref_pagamento' => 'Lorem ipsum dolor sit amet',
                'ultima_alteracao' => '2021-12-23 15:49:33',
                'utilizador' => 'Lorem ipsum dolor sit amet',
                'observacoes' => 'Lorem ipsum dolor sit amet',
                'referencia' => 'Lorem ipsum dolor sit amet',
                'data' => '2021-12-23'
            ],
        ];
        parent::init();
    }
}
