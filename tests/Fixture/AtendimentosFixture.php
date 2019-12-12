<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AtendimentosFixture
 */
class AtendimentosFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'sagen.atendimentos';
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'inicio' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'usuario_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'cidade_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'tipo_atendimento_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'requerente_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'beneficiario_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'orgao_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'solucao' => ['type' => 'text', 'length' => null, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null],
        'conclusao' => ['type' => 'text', 'length' => null, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null],
        'fim' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'created' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'modified' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'atendimento_beneficiario_id' => ['type' => 'foreign', 'columns' => ['beneficiario_id'], 'references' => ['public.pessoas', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'atendimento_cidades_id' => ['type' => 'foreign', 'columns' => ['cidade_id'], 'references' => ['public.cidades', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'atendimento_requerente_id' => ['type' => 'foreign', 'columns' => ['requerente_id'], 'references' => ['public.pessoas', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'atendimento_tipo_id' => ['type' => 'foreign', 'columns' => ['tipo_atendimento_id'], 'references' => ['public.tipos_atendimentos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'atendimento_usuario_id' => ['type' => 'foreign', 'columns' => ['usuario_id'], 'references' => ['public.usuarios', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'inicio' => 1576171013,
                'usuario_id' => 1,
                'cidade_id' => 1,
                'tipo_atendimento_id' => 1,
                'requerente_id' => 1,
                'beneficiario_id' => 1,
                'orgao_id' => 1,
                'solucao' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'conclusao' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'fim' => 1576171013,
                'created' => 1576171013,
                'modified' => 1576171013
            ],
        ];
        parent::init();
    }
}
