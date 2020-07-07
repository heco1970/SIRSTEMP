<?=$this->Html->css('/vendor/dynatables/jquery.dynatable.min.css', ['block' => true]);?>

<h1 class="h3 mb-2 text-gray-800"><?=__('Acessos')?></h1>

<div class="card shadow mb-2">
  <div class="card-header py-3">
    <button id="dynatable-filter" class="btn btn-secondary btn-circle btn-lg float-right"><i class="fas fa-filter"></i></button>
  </div>
</div>

<?php
$dynElems =
[
  'browser' => ['label' => __('Browser')],
  'browser_version' => ['label' => __('Versão do Browser')],
  'os' => ['label' => __('OS')],
  'os_version' => ['label' => __('Versão do OS')],
  'device' => ['label' => __('Dispositivo')],
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
            ['browser_version' => ['label' => __('Versão do Browser')]] +
            ['os' => ['label' => __('OS')]] +
            ['os_version' => ['label' => __('Versão do OS')]] +
            ['device' => ['label' => __('Dispositivo')]] +
            ['created' => ['label' => __('Data de Criação (Access)')]];
if ($admin) {
  $dynElems = ['user' => ['label' => __('User')]] + $dynElems;
}
?>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><?=__('Lista de Acessos')?></h6>
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

  });
</script>
<?php $this->end(); ?>
