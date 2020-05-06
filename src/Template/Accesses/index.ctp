<?=$this->Html->css('/vendor/dynatables/jquery.dynatable.min.css', ['block' => true]);?>

<h1 class="h3 mb-2 text-gray-800"><?=__('Accesses')?></h1>

<div class="card shadow mb-2">
  <div class="card-header py-3">
    <a class="btn btn-success btn-circle btn-lg" href="/users/add"><i class="fas fa-plus"></i></a>
    <button id="dynatable-filter" class="btn btn-secondary btn-circle btn-lg float-right"><i class="fas fa-filter"></i></button>
  </div>
</div>

<?php
$dynElems =
[
  'browser' => ['label' => __('Browser')],
  'browser_version' => ['label' => __('Browser Version')],
  'os' => ['label' => __('OS')],
  'os_version' => ['label' => __('OS Version')],
  'device' => ['label' => __('Device')],
  'createdfirst' => ['label' => __('Criado (Início)'), 'type' => 'text'],
  'createdlast' => ['label' => __('Criado (Fim)'), 'type' => 'text']
];
if ($admin) {
  $dynElems = ['user' => ['label' => __('User')]] + $dynElems;
}
?>
<?= $this->element('Dynatables/filter', ['dId' => 'dynatable', 'elements' => $dynElems]); ?>
<?php
$dynElems = ['browser' => ['label' => __('Browser')]] +
            ['browser_version' => ['label' => __('Browser Version')]] +
            ['os' => ['label' => __('OS')]] +
            ['os_version' => ['label' => __('OS Version')]] +
            ['device' => ['label' => __('Device')]] +
            ['created' => ['label' => __('Data de Criação (Access)')]];
?>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><?=__('List')?></h6>
  </div>
  <div class="card-body">
    <?= $this->element('Dynatables/table', ['dId' => 'dynatable', 'elements' => $dynElems, 'actions' => false]); ?>
  </div>
</div>

<?=$this->Html->script('/vendor/dynatables/jquery.dynatable.min.js', ['block' => true]);?>
<?=$this->Html->script('/js/dynatable-helper.js', ['block' => true]);?>

<?php $this->start('scriptBottom') ?>
<script>
  $(document).ready(function() {
    createDynatable("#dynatable","/accesses/<?=$admin?'admin':''?>",{created: -1});

    document.getElementById('createdfirst').type = 'date';
    document.getElementById('createdfirst').max = new Date().toISOString().split("T")[0];
    document.getElementById('createdlast').type = 'date';
    document.getElementById('createdlast').min = new Date().toISOString().split("T")[0];
  });
</script>
<?php $this->end(); ?>
