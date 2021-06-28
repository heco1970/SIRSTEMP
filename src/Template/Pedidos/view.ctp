<?= $this->Html->css('/vendor/dynatables/jquery.dynatable.min.css', ['block' => true]); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="/js/multiselect.js"></script>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('Detalhe de Pedido') ?></h6>
        <?= $this->Form->create($pedido, ['id' => 'myForm']) ?>
    </div>
    <div class="ml-3 mr-3 mb-3 mt-3">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row">
                    <div class="col-6">
                        <h6 class="text-primary"><?= __('ID Pedido') ?></h6>
                        <p><?= h($pedido->id) ?></p>
                    </div>
                    <div class="col-6">
                        <h6 class="text-primary"><?= __('Processo') ?></h6>
                        <p><?= h($pedido->processo->processo_id) ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-6">
                        <h6 class="text-primary"><?= __('Nome Pessoa') ?></h6>
                        <p><?= h($pedido->pessoa->nome) ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-6">
                        <h6 class="text-primary"><?= __('Equipa Responsável') ?></h6>
                        <p><?= h($pedido->team->nome) ?> </p>
                    </div>
                    <div class="col-6">
                        <h6 class="text-primary"><?= __('Tipo de Pedido de código') ?></h6>
                        <p><?= h($pedido->pedidostype->descricao) ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer card-footer-fixed">
        <?php if (empty($value)) { ?>
            <a href="/pedidos/index" class="btn btn-secondary float-right space-right"><?= __('Voltar') ?></a>
        <?php } else { ?>
            <a href="/pessoas/view/<?= h($pedido->pessoa_id) ?>" class="btn btn-secondary float-right space-right"><?= __('Voltar') ?></a>
        <?php } ?>
    </div>
</div>