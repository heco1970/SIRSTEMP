<?=$this->Html->css('/vendor/dynatables/jquery.dynatable.min.css', ['block' => true]);?>

    <h1 class="h3 mb-2 text-gray-800"><?=__('Registo de Pedidos')?></h1>

    <div class="card shadow mb-2">
        <div class="card-header py-3">
            <a class="btn btn-success btn-circle btn-lg" href="/pedidos/add"><i class="fas fa-plus"></i></a>
            <?= $this->Html->link(
                '<span class="fas fa-file-excel"></span><span class="sr-only">' . __('xls') . '</span>',
                ['action' => 'xls'],
                ['escape' => false, 'title' => __('xls'), 'class' => 'btn btn-primary btn-circle btn-lg float-right']) 
            ?>
            <button id="dynatable-filter" class="btn btn-secondary btn-circle btn-lg float-right mr-2"><i class="fas fa-filter"></i></button>
        </div>
    </div>


<?php
$dynElems =
    [
        'processo' => ['label' => __('Processo')],
        'pessoa' => ['label' => __('Pessoa')],
        'referencia' => ['label' => __('Referência')],
        'canalentrada' => ['label' => __('Canal de entrada')],
        'datarecepcao' => ['label' => __('Data de Receção')],
        'origem' => ['label' => __('Origem')],
        'Pedidostypes' => ['label' => __('Tipos de Pedidos')],
        'equiparesponsavel' => ['label' => __('Equipa Responsvel')],
        'state' => ['label' => __('Estado')],
        'termino' => ['label' => __('Termino')],
        'numeropedido' => ['label' => __('Número do pedido')],
        'datacriacao' => ['label' => __('Data criação')],
        'dataatribuicao' => ['label' => __('Data atribuição')],
        'datainicioefectivo' => ['label' => __('Data inicio efectivo')],
        'datatermoprevisto' => ['label' => __('Data termo previsto')],
        'dataefectivatermo' => ['label' => __('Data efetiva termo')],
        'Pedidosmotives' => ['label' => __('Pedidos de motivos')],
        'pais' => ['label' => __('País')],
        'concelho' => ['label' => __('Concelho')],
        'transferencias' => ['label' => __('Transferências')],
        'gestor' => ['label' => __('Gestor')],
        'seguro' => ['label' => __('Seguro')],
        'periocidaderelatorios' => ['label' => __('Periocidade relatorios')],
        'createdfirst' => ['label' => __('Criado (Início)'), 'type' => 'text'],
        'createdlast' => ['label' => __('Criado (Fim)'), 'type' => 'text']
    ];
?>
<?= $this->element('Dynatables/filter', ['dId' => 'dynatable', 'elements' => $dynElems]); ?>
<?php
$dynElems = ['processo' => ['label' => __('Processo')]] +
            ['pessoa' => ['label' => __('Pessoa')]] +
            ['referencia' => ['label' => __('Referência')]] +
            ['canalentrada' => ['label' => __('Canal de entrada')]] +
            ['datarecepcao' => ['label' => __('Data de Receção')]] +
            ['origem' => ['label' => __('Origem')]] +
            ['Pedidostypes' => ['label' => __('Tipos de Pedidos')]] +
            ['equiparesponsavel' => ['label' => __('Equipa Responsvel')]] +
            ['state' => ['label' => __('Estado')]] +
            ['termino' => ['label' => __('Termino')]] +
            ['numeropedido' => ['label' => __('Número do pedido')]] +
            ['datacriacao' => ['label' => __('Canal de entrada')]] +
            ['dataatribuicao' => ['label' => __('Data Atribuição')]] +
            ['datainicioefectivo' => ['label' => __('Data inicio efectivo')]] +
            ['datatermoprevisto' => ['label' => __('Data termo previsto')]] +
            ['dataefectivatermo' => ['label' => __('Data efetiva termo')]] +
            ['Pedidosmotives' => ['label' => __('Pedidos de motivos')]] +
            ['pais' => ['label' => __('País')]] +
            ['concelho' => ['label' => __('Concelho')]] +
            ['transferencias' => ['label' => __('Transferências')]] +
            ['gestor' => ['label' => __('Gestor')]] +
            ['seguro' => ['label' => __('Seguro')]] +
            ['periocidaderelatorios' => ['label' => __('Periocidade relatorios')]] +
            ['created' => ['label' => __('Data de Criação')]];
?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?=__('Listagem de Pedidos')?></h6>
        </div>
        <div class="card-body">
            <?= $this->element('Dynatables/table', ['dId' => 'dynatable', 'elements' => $dynElems, 'actions' => true]); ?>
        </div>
    </div>

<?= $this->element('Modal/generic', ['eId' => 'disable', 'title' => '', 'text' ]); ?>

<?=$this->Html->script('/vendor/dynatables/jquery.dynatable.min.js', ['block' => true]);?>
<?=$this->Html->script('/js/dynatable-helper.js', ['block' => true]);?>

<?php $this->start('scriptBottom') ?>
    <script>
        $(document).ready(function() {
            var writers = {
                ação: function(row) {
                    var view = '<a class="btn btn-info" href="/pedidos/view/' + row.id + '" data-toggle="tooltip" data-placement="top" title="<?=__('View')?>"><i class="far fa-eye fa-fw"></i></a>'
                    var edit = '<a class="btn btn-warning mr-1" href="/pedidos/edit/' + row.id + '" data-toggle="tooltip" data-placement="top" title="<?=__('Edit')?>"><i class="far fa-edit fa-fw"></i></a>'
                    var dele = '<a class="btn btn-danger" onclick="return confirm('+"'Quer mesmo apagar?'"+')" href="/pedidos/delete/' + row.id + 'data-toggle="tooltip" data-placement="top" title="<?=__('Delete')?>"><i class="fa fa-trash fa-fw"></i></a>'

                    return '<div class="btn-group btn-group-sm" role="group">' + view + edit +dele + '</div>';
                }
            }
            createDynatable("#dynatable","/pedidos/",{created: -1}, writers);
        });

    </script>
<?php $this->end(); ?>
