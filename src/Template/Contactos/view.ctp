<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contacto $contacto
 */
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('Detalhe do Contacto') ?></h6>
    </div>
    <div class="ml-4 mr-4 mb-2 mt-2">
        <div class="row">
            <div class="col">
                <h6 class="text-primary"><?= __('Nome da Pessoa') ?></h6>
                <p><?= $contacto->has('pessoa') ? h($contacto->pessoa->nome) : '' ?></p>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h6 class="text-primary"><?= __('Nome do Contacto') ?></h6>
                <p><?= h($contacto->nome) ?></p>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-4">
                <h6 class="text-primary"><?= __('Localidade') ?></h6>
                <p><?= h($contacto->localidade) ?></p>
                
            </div>
            <div class="col-4">
                <h6 class="text-primary"><?= __('País') ?></h6>
                <p><?= h($contacto->pai->paisNome) ?></p>
                
            </div>
            <div class="col-4">
                <h6 class="text-primary"><?= __('Morada') ?></h6>
                <p><?= h($contacto->morada) ?></p>
                
            </div>
        </div>
        <hr>
       
        <div class="row">

            <div class="col-4">
                <h6 class="text-primary"><?= __('Telefone') ?></h6>
                <p><?= h($contacto->telefone) ?></p>
            </div>
            <div class="col-4">
                <h6 class="text-primary"><?= __('Fax') ?></h6>
                <p><?= h($contacto->fax) ?></p>
            </div>
            <div class="col-4">
                <h6 class="text-primary"><?= __('Telemóvel') ?></h6>
                <p><?= h($contacto->telemovel) ?></p>

            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <h6 class="text-primary"><?= __('Email') ?></h6>
                <p><?= h($contacto->email) ?></p>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <h6 class="text-primary"><?= __('Descrição') ?></h6>
                <p><?= h($contacto->descricao) ?></p>

            </div>
            <div class="col-4">
                <h6 class="text-primary"><?= __('Estado') ?></h6>
                <p><?= $contacto->estado == 1 ? __('Ativo') : __('Não Ativo') ?></p>

            </div>
        </div>
    </div>
    <div class="card-footer card-footer-fixed">
        <?= $this->Html->link(__('Voltar'), ['controller' => 'Pessoas', 'action' => 'view', $contacto->pessoa->id], ['class' => 'btn btn-secondary']) ?>
    </div>

</div>