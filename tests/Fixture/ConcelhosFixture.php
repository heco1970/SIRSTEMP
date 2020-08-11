<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ConcelhosFixture
 *
 */
class ConcelhosFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 6, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'CodigoConcelho' => ['type' => 'smallinteger', 'length' => 6, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'CodigoDistrito' => ['type' => 'tinyinteger', 'length' => 2, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'Designacao' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => '', 'collate' => 'utf8_unicode_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'Distrito' => ['type' => 'index', 'columns' => ['CodigoDistrito'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'ConcelhoDistrito' => ['type' => 'unique', 'columns' => ['CodigoConcelho', 'CodigoDistrito'], 'length' => []],
            'Distrito' => ['type' => 'foreign', 'columns' => ['CodigoDistrito'], 'references' => ['distritos', 'CodigoDistrito'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_unicode_ci'
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
                'CodigoConcelho' => 1,
                'CodigoDistrito' => 1,
                'Designacao' => 'Lorem ipsum dolor sit amet'
            ],
        ];
        parent::init();
    }
}
