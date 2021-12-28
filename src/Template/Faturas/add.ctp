<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('Novo Registo Fatura') ?></h6>
    </div>
    <?= $this->Form->create($fatura) ?>
    <div class='ml-4 mt-4 mr-4'>
        <div id='my-form-body'>
            <div class="form-row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="num_fatura">Nº Fatura</label>
                        <?php echo $this->Form->control('num_fatura', ['label' => false, 'class' => 'form-control']); ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <?php echo $this->Form->control('nip', ['label' => false, 'class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="id_entidade">Entidade Judicial</label>
                        <?php echo $this->Form->control('id_entidade', ['id' => 'id_pedido', 'label' => false, 'type' => 'select', 'multiple' => false, 'options' => $entidades, 'class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="id_unidade">Unidade Orgânica</label>
                        <?php echo $this->Form->control('id_unidade', ['id' => 'id_pedido', 'label' => false, 'type' => 'select', 'multiple' => false, 'options' => $unidades, 'class' => 'form-control']); ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="data_emissao">Data Emissão</label>
                        <?php echo $this->Form->text('data_emissao', ['label' => false, 'class' => 'form-control', 'type' => 'date']); ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="id_pagamento">Estado</label>
                        <?php echo $this->Form->control('id_pagamento', ['id' => 'id_pedido', 'label' => false, 'type' => 'select', 'multiple' => false, 'options' => $pagamentos, 'class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="valor">Valor</label>
                        <?php echo $this->Form->control('valor', ['label' => false, 'class' => 'form-control']); ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="data_pagamento">Data Pagamento</label>
                        <?php echo $this->Form->text('data_pagamento', ['label' => false, 'class' => 'form-control', 'type' => 'date']); ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="ref_pagamento">Ref. Pagamento</label>
                        <?php echo $this->Form->control('ref_pagamento', ['label' => false, 'class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="ultima_alteracao">Ultima Alteração</label>
                        <?php echo $this->Form->text('ultima_alteracao', ['label' => false, 'class' => 'form-control', 'type' => 'date']); ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="utilizador">Utilizador</label>
                        <?php echo $this->Form->control('utilizador', ['label' => false, 'class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="data">Data</label>
                        <?php echo $this->Form->text('data', ['label' => false, 'class' => 'form-control', 'type' => 'date']); ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="referencia">Referência</label>
                        <?php echo $this->Form->control('referencia', ['label' => false, 'class' => 'form-control']); ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="observacoes">Observações</label>
                        <?php echo $this->Form->control('observacoes', ['type' => 'textarea', 'label' => false, 'class' => 'form-control']); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer card-footer-fixed">
        <?= $this->Form->button(__('Gravar'), ['class' => "btn btn-success float-right"]) ?>
        <a href="/faturas/index" class="btn btn-secondary float-right space-right"><?= __('Voltar') ?></a>
    </div>
    <?= $this->Form->end() ?>
</div>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/i18n/pt.min.js" integrity="sha512-HEvGImfrVPx3/wEaJU4WuHFc1nrdDsSkx+4gRbGIDHXmgvBoJLHBjVMjobvRz1Zox+QO6vqbpqexKAnEZKfhnQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?= $this->Html->css('https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css', ['block' => true]); ?>
<?= $this->Html->css('https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css', ['block' => true]); ?>
<?= $this->Html->script('https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js', ['block' => true]); ?>