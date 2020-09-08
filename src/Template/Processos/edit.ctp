<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('Novo Registo de Processo') ?></h6>
    </div>
    <?= $this->Form->create($processo) ?>
    <fieldset>
        <div class='ml-4 mt-4 mr-4'>
            <div class="row ">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="entidadejudiciai_id">Entidade Judicial</label>
                        <?php echo $this->Form->control('entidadejudiciai_id', ['label' => false, 'class' => 'form-control', 'options' => $entidadejudiciais]); ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group ui-widget">
                        <div class="form-group">
                            <label for="unit_id">Unidade Orgânica</label>
                            <?php echo $this->Form->control('unit_id', ['label' => false, 'class' => 'form-control', 'options' => $units]); ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="natureza_id">Natureza</label>
                        <?php echo $this->Form->control('natureza_id', ['label' => false, 'class' => 'form-control', 'options' => $naturezas]); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <?php echo $this->Form->control('nip', ['label' => false, 'class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="dataconclusao">Data de Conclusão</label>
                        <?php echo $this->Form->text('dataconclusao', ['label' => false, 'value'=>h($processo->dataconclusao),'class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="state_id">Estado</label>
                        <?php echo $this->Form->control('state_id', ['class' => 'form-control', 'options' => $states, 'label' => false]); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="observacoes">Observações</label>
                        <?php echo $this->Form->control('observacoes', ['type' => 'textarea','label' => false, 'class' => 'form-control']); ?>
                    </div>
                </div>
            </div>
        </div>
    </fieldset>
    <div class="card-footer card-footer-fixed">
        <?= $this->Form->button(__('Gravar'), ['class' => 'btn btn-success float-right']) ?>
        <a href="/processos/index" class="btn btn-secondary float-right space-right"><?= __('Voltar') ?></a>
    </div> <?= $this->Form->end() ?>
</div>