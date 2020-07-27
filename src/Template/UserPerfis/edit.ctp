<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserPerfi $userPerfi
 */
?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('Editar Registo de Perfil de Utilizador') ?></h6>
    </div>
    <?= $this->Form->create($userPerfi) ?>

    <div class='ml-4 mt-4'>
        <div class="form-row">
            <div class="col-6">
                <div class="form-group">
                    <label for="user">
                        <h4><?= __('Utilizador') ?></h4>
                    </label>
                    <?= $this->Form->control('user_id', ['options' => $users, 'class' => 'form-control', 'label' => false, 'disabled']); ?>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-6">
                <div class="form-group">
                    <label for="perfil">
                        <h4><?= __('Perfil') ?></h4>
                    </label>
                    <?= $this->Form->control('perfi_id', ['options' => $perfis, 'class' => 'form-control', 'label' => false, 'required']); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer card-footer-fixed">
        <?= $this->Form->button(__('Gravar'), ['class' => 'btn btn-success float-right']) ?>
        <a href="/user-perfis/index" class="btn btn-secondary float-right space-right"><?= __('Voltar') ?></a>
    </div>
    <?= $this->Form->end() ?>
</div>
