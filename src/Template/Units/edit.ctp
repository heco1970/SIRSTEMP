<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('Editar Unidade Orgânica') ?></h6>
    </div>
    <?= $this->Form->create($unit, ['id' => 'myForm']) ?>

    <div class='ml-4 mr-4 mt-4'>
        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <label for="unit">
                        <h4><?= __('Designação') ?></h4>
                    </label>
                    <?= $this->Form->control('designacao', ['class' => 'form-control', 'designacao' => 'designacao', 'label' => false, 'required']); ?>
                </div>
            </div>
        </div> 
    </div>

    <div class="card-footer card-footer-fixed">
        <?= $this->Form->button(__('Gravar alterações'), ['class' => 'btn btn-success float-right']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>