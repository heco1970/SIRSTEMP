<?=$this->Html->css('/vendor/dynatables/jquery.dynatable.min.css', ['block' => true]);?>

<h1 class="h3 mb-2 text-gray-800"><?=__('Users')?></h1>

<div class="card shadow mb-2">
  <div class="card-header py-3">
    <a class="btn btn-success btn-circle btn-lg" href="/users/add"><i class="fas fa-plus"></i></a>
    <button id="dynatable-filter" class="btn btn-secondary btn-circle btn-lg float-right"><i class="fas fa-filter"></i></button>
  </div>
</div>

<?php
$dynElems =
[
  'username' => ['label' => __('Username')],
  'type' => ['label' => __('Type'), 'options' => $types, 'empty' => ' '],
  'name' => ['label' => __('Name')],
  'createdfirst' => ['label' => __('Criado (Início)'), 'type' => 'text'],
  'createdlast' => ['label' => __('Criado (Fim)'), 'type' => 'text']
];
?>
<?= $this->element('Dynatables/filter', ['dId' => 'dynatable', 'elements' => $dynElems]); ?>
<?php
  $dynElems = ['username' => ['label' => __('Username')]] +
              ['type' => ['label' => __('Type')]] +
              ['name' => ['label' => __('Name')]] +
              ['created' => ['label' => __('Data de Criação')]];
?>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><?=__('List')?></h6>
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
      actions: function(row) {
        var view = '<a class="btn btn-info mr-1" href="/users/view/' + row.id + '" data-toggle="tooltip" data-placement="top" title="<?=__('View')?>"><i class="far fa-eye fa-fw"></i></a>'
        var password = '<a class="btn btn-warning mr-1" href="/users/adminPassword/' + row.id + '" data-toggle="tooltip" data-placement="top" title="<?=__('Change Password')?>"><i class="fas fa-key fa-fw"></i></a>'
        var toogleState = '<a class="btn btn-warning" href="/users/toogleState/' + row.id + '" data-toggle="tooltip" data-placement="top" title="<?=__('Disable')?>"><i class="fas fa-lock fa-fw"></i></a>'

        return '<div class="btn-group btn-group-sm" role="group">' + view + password + toogleState + '</div>';
      }
    }
    createDynatable("#dynatable","/users/",{created: -1}, writers);

    document.getElementById('createdfirst').type = 'date';
    document.getElementById('createdlast').type = 'date';

    document.getElementById("createdfirst").onchange = function() {
      if(document.getElementById('createdfirst').value != ""){
        datefirst = new Date(document.getElementById('createdfirst').value);
        datefirst.setDate(datefirst.getDate() + 1)
        document.getElementById('createdlast').min = datefirst.toISOString().split("T")[0];
      }
      else{
        document.getElementById('createdlast').min = null;
      }
    };

    document.getElementById("createdlast").onchange = function() {
      if(document.getElementById('createdlast').value != ""){
        datelast = new Date(document.getElementById('createdlast').value);
        datelast.setDate(datelast.getDate() - 1)
        document.getElementById('createdfirst').max = datelast.toISOString().split("T")[0];
      }
      else{
        document.getElementById('createdfirst').max = null;
      }
    };

    // function removeElement(url)
  });
</script>
<?php $this->end(); ?>
