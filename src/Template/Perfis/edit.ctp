<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Perfi $perfi
 */
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('Editar Registo de Perfil') ?></h6>
    </div>
    <?= $this->Form->create($perfi) ?>



    <div class='ml-4 mt-4'>
        <div class="form-row">
            <div class="col-6">
                <div class="form-group">
                    <label for="username">
                        <h4><?= __('Designação') ?></h4>
                    </label>
                    <?= $this->Form->control('perfil', ['class' => 'form-control', 'perfil' => 'perfil', 'label' => false, 'required']); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer card-footer-fixed">
        <?= $this->Form->button(__('Gravar'), ['class' => 'btn btn-success float-right']) ?>
        <a href="/perfis/index" class="btn btn-secondary float-right space-right"><?= __('Voltar') ?></a>
    </div>
    <?= $this->Form->end() ?>
</div>
