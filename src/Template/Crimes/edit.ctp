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
    <div class='ml-4 mt-4 mr-4'>
        <div id='my-form-body'>
            <div class="form-row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <label for="descricao">
                                <h4><?= __('Tipo de crime') ?></h4>
                            </label>
                            <?= $this->Form->control('descricao', ['class' => 'form-control', 'descricao' => 'descricao', 'label' => false, 'required']); ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <label for="name"><h4><?=__('Processo')?></h4></label>
                            <?= $this->Form->control('processo_id', ['class' => 'form-control', 'processo_id' => 'processo_id', 'label' => false, 'required']); ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <label for="occorrencia">
                                <h4><?= __('Ocorrencia') ?></h4>
                            </label>
                            <?= $this->Form->control('ocorrencia', ['class' => 'form-control', 'ocorrencia' => 'ocorrencia', 'label' => false, 'required']); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <label for="occorrencia">
                                <h4><?= __('Registo') ?></h4>
                            </label>
                            <?= $this->Form->control('registo', ['class' => 'form-control', 'registo' => 'registo', 'label' => false, 'required']); ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <label for="occorrencia">
                                <h4><?= __('Quantidade') ?></h4>
                            </label>
                            <?php echo $this->Form->control('qte', ['label' => false, 'class' => 'form-control', 'type' => 'number']); ?>

                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <label for="occorrencia">
                                <h4><?= __('Apenas') ?></h4>
                            </label>
                            <?= $this->Form->control('apenaspre', ['class' => 'form-control', 'apenaspre' => 'apenaspre', 'label' => false, 'required']); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-5">
                <div class="form-group">
                    <label for="multiselect">
                        <h4><?= __('Pessoas por selecionar: ') ?></h4>
                    </label>
                   
                   <?= $this->Form->control('multiselect',array('label'=>false,'size'=>8,'class'=>"form-control",'type' => 'select', 'multiple' => true, 'options' => $pessoas));?>
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
                        <h4><?= __('Pessoas selecionados: ') ?></h4>
                    </label>
                    
                    <?= $this->Form->control('pessoa_id',array('id'=>"multiselect_to",'label'=>false,'size'=>8,'class'=>"form-control",'type' => 'select', 'multiple' => true, 'options' => $pessoas1));?>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer card-footer-fixed">
        <?= $this->Form->button(__('Gravar alterações'), ['class' => 'btn btn-success float-right']) ?>
        <a href="/crimes/index" class="btn btn-secondary float-right space-right"><?= __('Voltar') ?></a>
    </div>
    <?= $this->Form->end() ?>
</div>
<script>
    $('#multiselect').multiselect();
</script>





