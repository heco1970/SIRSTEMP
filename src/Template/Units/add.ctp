<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?=__('Novo Registo de unidade')?></h6>
    </div>
    <?= $this->Form->create($unit) ?>

    <div class="row">

        <div class="col-sm-9">
            <div class="form-group">
                <div class="col-xs-6">
                    <label for="username"><h4><?=__('Designação')?></h4></label>
                    <?= $this->Form->control('designacao',['class' => 'form-control', 'designacao' => 'designacao', 'label' => false]);?>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer card-footer-fixed">
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success float-right']) ?>
        <a href="/units/add" class="btn btn-secondary float-right space-right"><?=__('Cancel')?></a>
    </div>
<?= $this->Form->end() ?>
</div>
