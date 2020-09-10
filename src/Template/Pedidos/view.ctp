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
                    <div class="col-4">
                        <h6 class="text-primary"><?= __('Processo') ?></h6>
                        <p><?= h($pedido->processo->processo_id) ?></p>
                    </div>
                    <div class="col-4">
                        <h6 class="text-primary"><?= __('Nome da Pessoa') ?></h6>
                        <p><?= h($pedido->pessoa->nome) ?></p>
                    </div>
                    <div class="col-4">
                        <h6 class="text-primary"><?= __('Canal de Entrada') ?></h6>
                        <p><?= h($pedido->canalentrada) ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-3">
                        <h6 class="text-primary"><?= __('Referência') ?></h6>
                        <p><?= h($pedido->referencia) ?></p>
                    </div>
                    <div class="col-3">
                        <h6 class="text-primary"><?= __('Gestor') ?></h6>
                        <p><?= h($pedido->gestor) ?></p>
                    </div>
                    <div class="col-3">
                        <h6 class="text-primary"><?= __('Seguro') ?></h6>
                        <p><?= h($pedido->seguro) ?></p>
                    </div>
                    <div class="col-3">
                        <h6 class="text-primary"><?= __('Periocidade de Relatórios') ?></h6>
                        <p><?= h($pedido->periocidaderelatorios) ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-3">
                        <h6 class="text-primary"><?= __('Data de Recepção') ?></h6>
                        <p><?= h($pedido->datarecepcao->i18nFormat('dd/MM/yyyy')) ?></p>
                    </div>
                    <div class="col-3">
                        <h6 class="text-primary"><?= __('Origem') ?></h6>
                        <p><?= h($pedido->origem) ?></p>
                    </div>
                    <div class="col-3">
                        <h6 class="text-primary"><?= __('Tipo de Pedido') ?></h6>
                        <p><?= h($pedido->pedidostype->descricao) ?></p>
                    </div>
                    <div class="col-3">
                        <h6 class="text-primary"><?= __('Número de Pedido') ?></h6>
                        <p><?= h($pedido->numeropedido) ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-3">
                        <h6 class="text-primary"><?= __('Equipa') ?></h6>
                        <p><?= h($pedido->team->nome) ?> </p>
                    </div>
                    <div class="col-3">
                        <h6 class="text-primary"><?= __('Estado') ?></h6>
                        <p><?= h($pedido->state->designacao) ?></p>
                    </div>
                    <div class="col-3">
                        <h6 class="text-primary"><?= __('Data de Término') ?></h6>
                        <p><?= h($pedido->termino->i18nFormat('dd/MM/yyyy')) ?></p>
                    </div>
                    <div class="col-3">
                        <h6 class="text-primary"><?= __('Data de Terminio Efectiva ') ?></h6>
                        <p><?= h($pedido->dataefectivatermo->i18nFormat('dd/MM/yyyy')) ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-3">
                        <h6 class="text-primary"><?= __('Data de Criação') ?></h6>
                        <p><?= h($pedido->datacriacao->i18nFormat('dd/MM/yyyy')) ?></p>
                    </div>
                    <div class="col-3">
                        <h6 class="text-primary"><?= __('Data de Atribuição') ?></h6>
                        <p><?= h($pedido->dataatribuicao->i18nFormat('dd/MM/yyyy')) ?></p>
                    </div>
                    <div class="col-3">
                        <h6 class="text-primary"><?= __('Data de Inicio Efectivo') ?></h6>
                        <p><?= h($pedido->datainicioefectivo->i18nFormat('dd/MM/yyyy')) ?></p>
                    </div>
                    <div class="col-3">
                        <h6 class="text-primary"><?= __('Data de Terminio Previsto') ?></h6>
                        <p><?= h($pedido->datatermoprevisto->i18nFormat('dd/MM/yyyy')) ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-3">
                        <h6 class="text-primary"><?= __('Motivo de Pedido') ?></h6>
                        <p><?= h($pedido->pedidosmotive->descricao) ?></p>
                    </div>
                    <div class="col-3">
                        <h6 class="text-primary"><?= __('País') ?></h6>
                        <p><?= h($pedido->pai->paisNome) ?></p>
                    </div>
                    <div class="col-3">
                        <h6 class="text-primary"><?= __('Concelho') ?></h6>
                        <p><?= h($pedido->concelho) ?></p>
                    </div>
                    <div class="col-3">
                        <h6 class="text-primary"><?= __('Transferências') ?></h6>
                        <p><?= h($pedido->transferencias) ?></p>
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