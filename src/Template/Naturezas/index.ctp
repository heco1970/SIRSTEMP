<?=$this->Html->css('/vendor/dynatables/jquery.dynatable.min.css', ['block' => true]);?>

<h1 class="h3 mb-2 text-gray-800"><?=__('Registo de Naturezas')?></h1>

<div class="card shadow mb-2">
    <div class="card-header py-3">
        <a class="btn btn-success btn-circle btn-lg" href="/naturezas/add"><i class="fas fa-plus"></i></a>
        <button id="dynatable-filter" class="btn btn-secondary btn-circle btn-lg float-right mr-2"><i class="fas fa-filter"></i></button>
    </div>
</div>

<?php
$dynElems =
    [
        'designacao' => ['label' => __('Designação')],
        'createdfirst' => ['label' => __('Criado (Início)'), 'type' => 'text'],
        'createdlast' => ['label' => __('Criado (Fim)'), 'type' => 'text']
    ];
?>
<?= $this->element('Dynatables/filter', ['dId' => 'dynatable', 'elements' => $dynElems]); ?>
<?php
$dynElems = ['designacao' => ['label' => __('Designação')]] +
            ['created' => ['label' => __('Data de Criação')]] +
            ['modified' => ['label' => __('Data de Modificação')]];
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?=__('Listagem de Naturezas')?></h6>
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
                var view = '<a class="btn btn-info mr-1" href="/naturezas/view/' + row.id + '" data-toggle="tooltip" data-placement="top" title="<?=__('View')?>"><i class="far fa-eye fa-fw"></i></a>'
                var edit = '<a class="btn btn-warning mr-1" href="/naturezas/edit/' + row.id + '" data-toggle="tooltip" data-placement="top" title="<?=__('Edit')?>"><i class="far fa-edit fa-fw"></i></a>'
                var dele = '<a class="btn btn-danger" onclick="return confirm('+"'Deseja mesmo apagar?'"+')" href="/naturezas/delete/' + row.id + 'data-toggle="tooltip" data-placement="top" title="<?=__('Delete')?>"><i class="fa fa-trash fa-fw"></i></a>'

                return '<div class="btn-group btn-group-sm" role="group">'+ view + edit + dele + '</div>';
            }
        }
            
        createDynatable("#dynatable","/naturezas/",{created: -1}, writers);
        
        document.getElementById('createdfirst').type = 'date';
        document.getElementById('createdlast').type = 'date';

        document.getElementById("createdfirst").onchange = function() {
            if(document.getElementById('createdfirst').value != ""){
                datefirst = new Date(document.getElementById('createdfirst').value);
                datefirst.setDate(datefirst.getDate() + 1);
                document.getElementById('createdlast').min = datefirst.toISOString().split("T")[0];
            }
            else{
                document.getElementById('createdlast').min = null;
            }
        };

        document.getElementById("createdlast").onchange = function() {
            if(document.getElementById('createdlast').value != ""){
                datelast = new Date(document.getElementById('createdlast').value);
                datelast.setDate(datelast.getDate() - 1);
                document.getElementById('createdfirst').max = datelast.toISOString().split("T")[0];
            }
            else{
                document.getElementById('createdfirst').max = null;
            }
        };
    });
</script>
<?php $this->end(); ?>

