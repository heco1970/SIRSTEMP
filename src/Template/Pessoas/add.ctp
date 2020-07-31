<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pessoa $pessoa
 */
?>
<div class="alert alert-success" role="alert">
    Novo Registo de Pessoa
</div>
<?= $this->Form->create($pessoa) ?>

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
                <?php echo $this->Form->control('id_estadocivil',['label' => false,'type' => 'select','multiple' => false,'options' => $estadocivils,'class'=>'form-control']); ?>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="id_genero">Genero</label>
                
                <?php echo $this->Form->control('id_genero',['label' => false,'type' => 'select','multiple' => false,'options' => $generos,'class'=>'form-control']); ?>

            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="pais_id">Nacionalidade</label>
               
                <?php echo $this->Form->control('pais_id',['label' => false,'type' => 'select','multiple' => false,'options' => $pais,'class'=>'form-control']); ?>

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
                <?php echo $this->Form->control('nif', ['label' => false, 'class' => 'form-control','type' => 'text']); ?>

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
                <label for="observacoes">Observações</label>

                <?php echo $this->Form->control('observacoes', ['label' => false, 'class' => 'form-control']); ?>


            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('Crimes') ?></h6>
    </div>
    <?= $this->Form->create() ?>

    <div class='ml-4 mt-4 mr-4'>
       
        <div class="form-row">
            <div class="col-5">
                <div class="form-group">
                    <label for="multiselect">
                        <h4><?= __('Por selecionar: ') ?></h4>
                    </label>

                    <?= $this->Form->control('multiselect', array('label' => false, 'size' => 8, 'class' => "form-control", 'type' => 'select', 'multiple' => true, 'options')); ?>
                </div>
            </div>
            <div class="col-2">
                <div class="form-group mt-5">
                    <button type="button" id="multiselect_rightAll" class="btn btn-block btn-warning">Adicionar Todos</button>
                    <button type="button" id="multiselect_rightSelected" class="btn btn-block btn-primary">Adicionar<i class="glyphicon glyphicon-chevron-right"></i></button>
                    <button type="button" id="multiselect_leftSelected" class="btn btn-block btn-primary">Remover<i class="glyphicon glyphicon-chevron-left"></i></button>
                    <button type="button" id="multiselect_leftAll" class="btn btn-block btn-warning">Remover Todos<i class="glyphicon glyphicon-backward"></i></button>
                </div>
            </div>
            <div class="col-5">
                <div class="form-group">
                    <label for="multiselect_to">
                        <h4><?= __('Selecionados: ') ?></h4>
                    </label>

                    <?= $this->Form->control('multiselect_to', array('id' => "multiselect_to", 'label' => false, 'size' => 8, 'class' => "form-control", 'type' => 'select', 'multiple' => true)); ?>

                </div>
            </div>
        </div>
    </div>
    <div class="card-footer card-footer-fixed">
        <?= $this->Form->button(__('Gravar'), ['class' => 'btn btn-success float-right']) ?>
        <a href="/pessoas/index" class="btn btn-secondary float-right space-right"><?= __('Voltar') ?></a>
    </div>
    <?= $this->Form->end() ?>
    <script>
        $('#multiselect').multiselect();
    </script>

</div>

<?= $this->Form->button(__('Gravar'), ['class' => "btn btn-success"]) ?>

<?= $this->Form->end() ?>