<?= $this->Html->css('/vendor/dynatables/jquery.dynatable.min.css', ['block' => true]); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="/js/multiselect.js"></script>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('Detalhe de Crime') ?></h6>
        <?= $this->Form->create($crime, ['id' => 'myForm']) ?>
    </div>
    <div class="ml-3 mr-3 mb-3 mt-3">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row">
                    <div class="col-4">
                        <h6 class="text-primary"><?= __('Nome') ?></h6>
                        <p><?= h($crime->pessoa->nome) ?></p>
                    </div>
                    <div class="col-4">
                        <h6 class="text-primary"><?= __('Tipo de crime') ?></h6>
                        <p><?= h($crime->tipocrime->descricao) ?></p>
                    </div>
                    <div class="col-4">
                        <h6 class="text-primary"><?= __('Processo') ?></h6>
                        <p><?= h($crime->processo->nip) ?></p>
                    </div>
                    <div class="col-4">
                        <h6 class="text-primary"><?= __('Ocorrencia') ?></h6>
                        <p><?= h($crime->ocorrencia) ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-3">
                        <h6 class="text-primary"><?= __('Registo') ?></h6>
                        <p><?= h($crime->registo->i18nFormat('dd/MM/yyyy')) ?></p>
                    </div>
                    <div class="col-3">
                        <h6 class="text-primary"><?= __('Quantidade') ?></h6>
                        <p><?= h($crime->qte) ?></p>
                    </div>
                    <div class="col-3">
                        <h6 class="text-primary"><?= __('Apenas') ?></h6>
                        <p><?= h($crime->apenaspre) ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>