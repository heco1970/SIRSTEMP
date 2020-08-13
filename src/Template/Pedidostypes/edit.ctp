<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('Editar Tipo de Pedido') ?></h6>
    </div>
    <?= $this->Form->create($pedidostype, ['id' => 'myForm']) ?>

    <div class='ml-4 mr-4 mt-4'>
        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <label for="team">
                        <h4><?= __('Descrição') ?></h4>
                    </label>
                    <?= $this->Form->control('descricao', ['class' => 'form-control', 'descricao' => 'descricao', 'label' => false, 'required']); ?>
                </div>
            </div>
        </div>

       
    </div>
    <div class="card-footer card-footer-fixed">
        <?= $this->Form->button(__('Gravar alterações'), ['class' => 'btn btn-success float-right']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
