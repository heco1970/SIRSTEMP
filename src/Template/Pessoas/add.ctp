<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pessoa $pessoa
 */
?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('Novo Registo de Pessoa') ?></h6>
    </div>
    <?= $this->Form->create($pessoa) ?>
    <div class='ml-4 mt-4 mr-4'>
        <div id='my-form-body'>

            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="nome">Nome da Pessoa</label>
                        <?php echo $this->Form->control('nome', ['label' => false, 'class' => 'form-control']); ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="nome_alt">Nome Alternativo</label>
                        <?php echo $this->Form->control('nome_alt', ['label' => false, 'class' => 'form-control']); ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="nomepai">Nome do Pai</label>
                        <?php echo $this->Form->control('nomepai', ['label' => false, 'class' => 'form-control']); ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="nomemaae">Nome da Mâe</label>
                        <?php echo $this->Form->control('nomemae', ['label' => false, 'class' => 'form-control']); ?>

                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="id_estadocivil">Estado Civil</label>
                        <?php echo $this->Form->control('id_estadocivil', ['label' => false, 'type' => 'select', 'multiple' => false, 'options' => $estadocivils, 'class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="id_genero">Genero</label>

                        <?php echo $this->Form->control('id_genero', ['label' => false, 'type' => 'select', 'multiple' => false, 'options' => $generos, 'class' => 'form-control']); ?>

                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="pais_id">Nacionalidade</label>

                        <?php echo $this->Form->control('pais_id', ['label' => false, 'type' => 'select', 'multiple' => false,'default'=>193, 'options' => $pais, 'class' => 'form-control']); ?>

                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="distrito">Distrito</label>
                        <?php echo $this->Form->control('distrito', ['label' => false, 'class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="concelho">Concelho</label>

                        <?php echo $this->Form->control('concelho', ['label' => false, 'class' => 'form-control']); ?>

                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="freguesia">Freguesia</label>

                        <?php echo $this->Form->control('freguesia', ['label' => false, 'class' => 'form-control']); ?>

                    </div>
                </div>
            </div>

            <div class="form-row">


                <div class="col">
                    <div class="form-group">
                        <label for="hea">Data de Nascimento</label>
                        <?php echo $this->Form->text('data_nascimento', ['label' => false, 'class' => 'form-control', 'type' => 'date']); ?>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="cc">Cartão de Cidadão</label>
                        <?php echo $this->Form->control('cc', ['label' => false, 'class' => 'form-control']); ?>

                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="nif">Numero de Contribuinte</label>
                        <?php echo $this->Form->control('nif', ['label' => false, 'class' => 'form-control', 'type' => 'text']); ?>

                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="outroidentifica">Outra Identificação</label>
                        <?php echo $this->Form->control('outroidentifica', ['label' => false, 'class' => 'form-control']); ?>

                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="centro_edu">Centro Educacional</label>
                        <?php echo $this->Form->control('centro_educs_id', ['label' => false, 'class' => 'form-control','options' => $centro_educs]); ?>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="estb_pri">Estabelecimento Prisional</label>

                        <?php echo $this->Form->control('estb_pris_id', ['label' => false, 'class' => 'form-control','options' => $estb_pris]); ?>

                    </div>
                </div>

            </div>

            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="observacoes">Observações</label>

                        <?php echo $this->Form->control('observacoes', ['label' => false, 'class' => 'form-control']); ?>


                    </div>
                </div>
            </div>


        </div>
    </div>
    <div class="card-footer card-footer-fixed">
        <?= $this->Form->button(__('Gravar'), ['class' => "btn btn-success"]) ?>
        <a href="/pessoas/index" class="btn btn-secondary"><?= __('Voltar') ?></a>
    </div>
    <?= $this->Form->end() ?>
</div>