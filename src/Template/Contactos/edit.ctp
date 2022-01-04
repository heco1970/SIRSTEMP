<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contacto $contacto
 */
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('Editar Contacto de ') ?> <?= h($pessoa->nome) ?></h6>
    </div>
    <div class='ml-4 mt-4 mr-4'>
        <?= $this->Form->create($contacto) ?>

        <div id='my-form-body'>
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <?= $this->Form->control('nome', ['label' => false, 'class' => "form-control"]); ?>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <?= $this->Form->control('email', ['type' => 'email', 'label' => false, 'class' => "form-control"]); ?>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="localidade">Localidade</label>
                        <?= $this->Form->control('localidade', ['label' => false, 'class' => "form-control"]); ?>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <?= $this->Form->control('telefone', ['type' => 'number', 'label' => false, 'class' => "form-control"]); ?>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="telemovel">Telemóvel</label>
                        <?= $this->Form->control('telemovel', ['type' => 'number', 'label' => false, 'class' => "form-control"]); ?>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="fax">Fax</label>
                        <?= $this->Form->control('fax', ['type' => 'number', 'label' => false, 'class' => "form-control"]); ?>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <?= $this->Form->control('descricao', ['type' => 'textarea', 'label' => false, 'class' => "form-control"]); ?>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <?= $this->Form->control('estado', ['options' => ['0' => 'Não Ativo', '1' => 'Ativo'], 'label' => false, 'class' => "form-control"]); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer card-footer-fixed">
        <?= $this->Form->button(__('Gravar'), ['class' => 'btn btn-success float-right']) ?>
        <a href="/pessoas/view/<?= h($contacto->pessoa_id) ?>" class="btn btn-secondary float-right space-right"><?= __('Voltar') ?></a>
    </div>
    <?= $this->Form->end() ?>
</div>