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


</div>

<?= $this->Form->button(__('Gravar'), ['class' => "btn btn-success"]) ?>

<?= $this->Form->end() ?>