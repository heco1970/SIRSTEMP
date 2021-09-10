<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('Novo Registo de Processos') ?></h6>
    </div>
    <?= $this->Form->create($processo) ?>
    <div class='ml-4 mt-4 mr-4'>
        <div id='my-form-body'>
            <div class="form-row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <?php echo $this->Form->control('nip', ['label' => false, 'class' => 'form-control', 'required']); ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="processo_id">ID Processo</label>
                        <?php echo $this->Form->control('processo_id', ['value' => $nextUser,'label' => false, 'class' => 'form-control', 'disabled' => true, 'type'=>'text']); ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="ultimaalteracao">Tribunal</label>
                        <?php echo $this->Form->control('ultimaalteracao', ['label' => false, 'class' => 'form-control', 'empty' => ['' => ''], 'options' => $entidades, 'required']); ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="entidadejudiciai_id">Comarca Judicial</label>
                        <?php echo $this->Form->control('entidadejudiciai_id', ['label' => false, 'class' => 'form-control', 'empty' => ['' => ''], 'options' => $entidades, 'required']);?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="unit_id">Entidade Solicitante</label>
                        <?php echo $this->Form->control('unit_id', ['label' => false, 'class' => 'form-control', 'empty' => ['' => ''], 'options' => $units, 'required']); ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="natureza">Natureza</label>
                        <?php echo $this->Form->control('natureza_id', ['label' => false, 'class' => 'form-control', 'options' => $naturezas,'required','empty' => ['' => '']]); ?>
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
        <a href="#" onclick="history.go(-1);" class="btn btn-secondary float-right space-right"><?= __('Voltar') ?></a>
    </div>
    <?= $this->Form->end() ?>
</div>