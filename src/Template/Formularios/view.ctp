<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('Detalhe do PTFC') ?></h6>
    </div>
    <div class="ml-3 mr-3 mb-3 mt-3">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row">
                    <div class="col-2">
                        <h6 class="text-primary"><?= __('Id Pedido') ?></h6>
                        <p><?= $this->Number->format($formulario->id_pedido) ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <h6 class="text-primary"><?= __('DR/DS') ?></h6>
                        <p><?= h($formulario->dr_ds) ?></p>
                    </div>
                    <div class="col-4">
                        <h6 class="text-primary"><?= __('Equipa/CE') ?></h6>
                        <p><?= h($formulario->team->nome) ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-10">
                        <h6 class="text-primary"><?= __('Nome do Prestador de Trabalho/Tarefa') ?></h6>
                        <p><?= h($formulario->nome_prestador_trabalho) ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-10">
                        <h6 class="text-primary"><?= __('Designação da Entidade Beneficiária de Trabalho/Tarefa') ?>
                        </h6>
                        <p><?= h($formulario->designacao_entidade) ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <h6 class="text-primary"><?= __('Número de horas aplicadas') ?></h6>
                        <p><?= $this->Number->format($formulario->hora_aplicadas) ?></p>
                    </div>
                    <div class="col-4">
                        <h6 class="text-primary"><?= __('Número de horas efectivamente prestadas') ?></h6>
                        <p><?= $this->Number->format($formulario->hora_prestadas) ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-10">
                        <h6 class="text-primary"><?= __('Actividade exercida') ?></h6>
                        <p><?= h($formulario->actividade_exercida) ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <h6 class="text-primary"><?= __('Data do fim execução pena/media(d/m/a)') ?></h6>
                        <p><?= h($formulario->data_fim_execucao->i18nFormat('dd-MM-yyyy')) ?></p>
                    </div>
                    <div class="col-4">
                        <h6 class="text-primary"><?= __('Data(d/m/a)') ?></h6>
                        <p><?= h($formulario->data->i18nFormat('dd-MM-yyyy')) ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-10">
                        <h6 class="text-primary"><?= __('O/A Técnico(a)') ?></h6>
                        <p><?= h($formulario->tecnico) ?></p>
                    </div>
                </div>
                <?php $this->end(); ?>
            </div>
        </div>
    </div>
    <div class="card-footer card-footer-fixed">
        <a href="/formularios/index" class="btn btn-secondary float-right space-right"><?= __('Voltar') ?></a>
    </div>
</div>