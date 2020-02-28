<?=$this->Html->css('/vendor/dynatables/jquery.dynatable.min.css', ['block' => true]);?>

<h1 class="h3 mb-2 text-gray-800"><?=__('Registo de Processos')?></h1>

<div class="card shadow mb-2">
    <div class="card-header py-3">
        <a class="btn btn-success btn-circle btn-lg" href="/verbetes/add"><i class="fas fa-plus"></i></a>
        <button id="dynatable-filter" class="btn btn-secondary btn-circle btn-lg float-right"><i class="fas fa-filter"></i></button>
    </div>
</div>


<?php
$dynElems =
    [
        'id' => ['label' => __('Id')],
        'Pessoa' => ['label' => __('Pessoa')],
        'criacao' => ['label' => __('Data Criação')],
        'distribuicao' => ['label' => __('Data Distribuição')],
        'efectivo' => ['label' => __('Data Inicio Efectivo')],

    ];
?>
<?= $this->element('Dynatables/filter', ['dId' => 'dynatable', 'elements' => $dynElems]); ?>
<?php
$dynElems['created'] = ['label' => 'Data de Criação'];
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?=__('Listagem de Pessoas')?></h6>
    </div>
    <div class="card-body">
        <?= $this->element('Dynatables/table', ['dId' => 'dynatable', 'elements' => $dynElems, 'actions' => true]); ?>
    </div>
</div>

<?= $this->Html->link('Download', ['controller' => 'Verbetes', 'action' => 'xls'], ['class' => 'btn btn-primary btn-lg float-right']) ?>

<?= $this->element('Modal/generic', ['eId' => 'disable', 'title' => '', 'text' ]); ?>

<?=$this->Html->script('/vendor/dynatables/jquery.dynatable.min.js', ['block' => true]);?>
<?=$this->Html->script('/js/dynatable-helper.js', ['block' => true]);?>

<?php $this->start('scriptBottom') ?>
<script>
    $(document).ready(function() {
        var writers = {
            actions: function(row) {
                var view = '<a class="btn btn-info" href="/verbetes/view/' + row.id + '" data-toggle="tooltip" data-placement="top" title="<?=__('View')?>"><i class="far fa-eye fa-fw"></i></a>'

                return '<div class="btn-group btn-group-sm" role="group">' + view +  '</div>';
            }
        }
        createDynatable("#dynatable","/verbetes/",{created: -1}, writers);

        // function removeElement(url)
    });
</script>
<?php $this->end(); ?>
