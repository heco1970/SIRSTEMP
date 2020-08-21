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
                <div class="col-sm-6">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <label for="nome">
                                <h4><?= __('Nome') ?></h4>
                            </label>
                            <?= $this->Form->control('pessoa_id', ['class' => 'form-control', 'pessoa_id' => 'pessoa_id', 'label' => false, 'required']); ?>
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
    </div>
    <div class="card-footer card-footer-fixed">
        <?= $this->Form->button(__('Gravar'), ['class' => 'btn btn-success float-right', 'onclick' => 'selectAll()']) ?>
        <a href="/crimes/index" class="btn btn-secondary float-right space-right"><?= __('Voltar') ?></a>
    </div>
    <?= $this->Form->end() ?>
</div>





