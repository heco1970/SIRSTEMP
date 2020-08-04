



<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Perfi $perfi
 */
?>
<link href="/css/style.css" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="/js/multiselect.js"></script>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('Editar Registo de Crimes') ?></h6>
    </div>
    <?= $this->Form->create($crime, ['id' => 'myForm']) ?>



    <div class='ml-4 mr-4 mt-4'>
        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <label for="crime">
                        <h4><?= __('Designação') ?></h4>
                    </label>
                    <?= $this->Form->control('descricao', ['class' => 'form-control', 'descricao' => 'descricao', 'label' => false, 'required']); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer card-footer-fixed">
        <?= $this->Form->button(__('Gravar'), ['class' => 'btn btn-success float-right', 'onclick' => 'selectAll()']) ?>
        <a href="/crimes/index" class="btn btn-secondary float-right space-right"><?= __('Voltar') ?></a>
    </div>
    <?= $this->Form->end() ?>
</div>





