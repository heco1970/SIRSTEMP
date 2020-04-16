<?=$this->Html->css('/vendor/dynatables/jquery.dynatable.min.css', ['block' => true]);?>

  <h1 class="h3 mb-2 text-gray-800"><?=__('Attempts')?></h1>

  <div class="card shadow mb-2">
    <div class="card-header py-3">
      <a class="btn btn-success btn-circle btn-lg" href="/attempts/add"><i class="fas fa-plus"></i></a>
      <button id="dynatable-filter" class="btn btn-secondary btn-circle btn-lg float-right"><i class="fas fa-filter"></i></button>
    </div>
  </div>

<?php
$dynElems =
  [
    'username' => ['label' => __('Username')],
    'ban' => ['label' => __('Estado'), 'type' => 'select', 'options' => ['Ativo','Banido'], 'empty' => ' '],
    'modifiedFirst' => ['label' => __('Ultima alteração de'), 'type' => 'date', 'empty' => ' '],
    'modifiedLast' => ['label' => __('Ultima alteração até'), 'type' => 'date', 'empty' => ' ']
  ];
?>
<?= $this->element('Dynatables/filter', ['dId' => 'dynatable', 'elements' => $dynElems]); ?>
<?php
  $dynElems = ['username' => ['label' => __('Username')]] + 
              ['ban' => ['label' => __('Estado')]] +
              ['modified' => ['label' => __('Ultima alteração')]];
?>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary"><?=__('List')?></h6>
    </div>
    <div class="card-body">
      <?= $this->element('Dynatables/table', ['dId' => 'dynatable', 'elements' => $dynElems, 'actions' => true]); ?>
    </div>
  </div>

<?=$this->Html->script('/vendor/dynatables/jquery.dynatable.min.js', ['block' => true]);?>
<?=$this->Html->script('/js/dynatable-helper.js', ['block' => true]);?>

<?php $this->start('scriptBottom') ?>
  <script>
    $(document).ready(function() {
      var writers = {
        actions: function(row) {
          var view = '<a class="btn btn-info" href="/attempts/view/' + row.id + '" data-toggle="tooltip" data-placement="top" title="<?=__('View')?>"><i class="far fa-eye fa-fw"></i></a>'
          view += '<a class="btn btn-info" href="/attempts/edit/' + row.id + '" data-toggle="tooltip" data-placement="top" title="<?=__('Edit')?>"><i class="far fa-edit fa-fw"></i></a>';

          return '<div class="btn-group btn-group-sm" role="group">' + view + '</div>';
        }
      }

      createDynatable("#dynatable","/attempts/<?=$admin?'admin':''?>",{created: -1}, writers);

      // function removeElement(url)
    });
  </script>
<?php $this->end(); ?>
