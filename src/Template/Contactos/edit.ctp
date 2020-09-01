<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contacto $contacto
 */
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('Editar Registo de Contacto') ?></h6>
    </div>
    <div class='ml-4 mt-4 mr-4'>
        <?= $this->Form->create($contacto) ?>

        <div id='my-form-body'>
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="nome">Nome do Contacto</label>
                        <?= $this->Form->control('nome', [ 'label' => false, 'class' => "form-control"]); ?>

                    </div>
                </div>
            </div>


            <div class="form-row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="localidade">Localidade</label>
                        <?= $this->Form->control('localidade', ['label' => false, 'class' => "form-control", 'required']); ?>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="pais_id">País</label>
                        <?= $this->Form->control('pais_id', ['label' => false, 'options' => $pais, 'class' => "form-control", 'required']); ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="morada">Morada</label>
                        <?= $this->Form->control('morada', [ 'label' => false, 'class' => "form-control"]); ?>

                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="telefone">Telefone</label>

                        <?= $this->Form->control('telefone', ['label' => false, 'class' => "form-control"]); ?>

                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label for="fax">Fax</label>

                        <?= $this->Form->control('fax', ['label' => false, 'class' => "form-control"]); ?>

                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label for="telemovel">Telemóvel</label>

                        <?= $this->Form->control('telemovel', ['label' => false, 'class' => "form-control"]); ?>


                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="email">Email</label>

                        <?= $this->Form->control('email', ['label' => false, 'class' => "form-control", 'required']); ?>


                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="descricao">Descrição</label>

                        <?= $this->Form->control('descricao', ['label' => false, 'class' => "form-control"]); ?>


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
        <button class="btn btn-success" type="submit">Gravar</button>
        <?= $this->Html->link(__('Voltar'), ['controller' => 'Pessoas', 'action' => 'view', $contacto->pessoa->id], ['class' => 'btn btn-secondary']) ?>
   
    </div>
    <?= $this->Form->end() ?>

</div>