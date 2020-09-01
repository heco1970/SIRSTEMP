<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('Novo Registo de Processos') ?></h6>
    </div>
    <?= $this->Form->create($processo) ?>
    <div class='ml-4 mt-4 mr-4'>
        <div id='my-form-body'>
            <div class="form-group">
                <label for="processo_id">ID do Processo</label>
                <?php echo $this->Form->control('processo_id', ['type'=>'text','label' => false, 'class' => 'form-control','required']); ?>
            </div>
            <div class="form-group">
                <label for="entidadejudiciai_id">Entidade Judicial</label>
                <?php echo $this->Form->control('entidadejudiciai_id', ['label' => false, 'class' => 'form-control', 'empty' => ['' => ''], 'options' => $entidades, 'required']); ?>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="unit_id">Unidade Orgânica</label>
                        <?php echo $this->Form->control('unit_id', ['label' => false, 'class' => 'form-control', 'empty' => ['' => ''], 'options' => $units, 'required']); ?>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="natureza">Natureza</label>
                        <?php echo $this->Form->control('natureza', ['label' => false, 'class' => 'form-control', 'required']); ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="dataconclusao">Data de Conclusão</label>
                        <?php echo $this->Form->text('dataconclusao', ['label' => false, 'class' => 'form-control', 'type' => 'date', 'required']); ?>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <?php echo $this->Form->control('nip', ['label' => false, 'class' => 'form-control', 'required']); ?>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="state_id">Estado</label>
                        <?php echo $this->Form->control('state_id', ['label' => false, 'class' => 'form-control', 'options' => $states, 'required']); ?>
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
        <a href="/processos/index" class="btn btn-secondary"><?= __('Voltar') ?></a>
    </div>
    <?= $this->Form->end() ?>
</div>