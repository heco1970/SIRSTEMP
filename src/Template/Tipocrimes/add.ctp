

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('Novo Tipo de Crime') ?></h6>
    </div>
    <?= $this->Form->create($tipocrime) ?>
    <div class='ml-4 mt-4 mr-4'>
        <div id='my-form-body'>
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <?php echo $this->Form->control('descricao', ['label' => false, 'class' => 'form-control', 'required']); ?>
                    </div>
                </div>
            </div> 
        </div>
    </div>
    <div class="card-footer card-footer-fixed">
        <?= $this->Form->button(__('Gravar'), ['class' => "btn btn-success"]) ?>
        <a href="/tipocrimes/index" class="btn btn-secondary"><?= __('Voltar') ?></a>
    </div>
    <?= $this->Form->end() ?>
</div>
