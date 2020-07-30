<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Crime[]|\Cake\Collection\CollectionInterface $crimes
 */
?>

<?=$this->Html->css('/vendor/dynatables/jquery.dynatable.min.css', ['block' => true]);?>

<h1 class="h3 mb-2 text-gray-800"><?=__('Crimes')?></h1>

<div class="card shadow mb-2">
    <div class="card-header py-3">
        <a class="btn btn-success btn-circle btn-lg" href="/crimes/add"><i class="fas fa-plus"></i></a>
        <button id="dynatable-filter" class="btn btn-secondary btn-circle btn-lg float-right mr-2"><i class="fas fa-filter"></i></button>
    </div>
</div>

<?php
$dynElems =
    [
        'descricao' => ['label' => __('Descricao')],
    ];
?>
<?= $this->element('Dynatables/filter', ['dId' => 'dynatable', 'elements' => $dynElems]); ?>
<?php
$dynElems = ['descricao' => ['label' => __('Descricao')]] 
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?=__('Crimes')?></h6>
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
                var view = '<a class="btn btn-info mr-1" href="/crimes/view/' + row.id + '" data-toggle="tooltip" data-placement="top" title="<?=__('View')?>"><i class="far fa-eye fa-fw"></i></a>'
                var edit = '<a class="btn btn-warning mr-1" href="/crimes/edit/' + row.id + '" data-toggle="tooltip" data-placement="top" title="<?=__('Edit')?>"><i class="far fa-edit fa-fw"></i></a>'
                var dele = '<a class="btn btn-danger" onclick="return confirm('+"'Quer mesmo apagar?'"+')" href="/crimes/delete/' + row.id + 'data-toggle="tooltip" data-placement="top" title="<?=__('Delete')?>"><i class="fa fa-trash fa-fw"></i></a>'

                return '<div class="btn-group btn-group-sm" role="group">'+ view + edit + dele +  '</div>';
            }
        }
        createDynatable("#dynatable","/crimes/",{created: -1}, writers);
    });


</script>
<?php $this->end(); ?>

