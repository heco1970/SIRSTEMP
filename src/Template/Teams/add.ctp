<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('Novo Registo de Equipa') ?></h6>
    </div>
    <?= $this->Form->create($team) ?>
    <div class='ml-4 mt-4 mr-4'>
        <div id='my-form-body'>
            <div class="form-row">
                <div class="col-8">
                    <div class="form-group">
                        <label for="nome">Designação</label>
                        <?php echo $this->Form->control('nome', ['label' => false, 'class' => 'form-control', 'required' => true]); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer card-footer-fixed">
        <?= $this->Form->button(__('Gravar'), ['class' => "btn btn-success"]) ?>
        <a href="/teams/index" class="btn btn-secondary"><?= __('Voltar') ?></a>
    </div>
    <?= $this->Form->end() ?>
</div>

