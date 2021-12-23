<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('Detalhe Fatura') ?></h6>
    </div>
    <div class="ml-3 mr-3 mb-3 mt-3">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row">
                    <div class="col-3">
                        <h6 class="text-primary"><?= __('Nº Fatura') ?></h6>
                        <p><?= h($fatura->num_fatura) ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-4">
                        <h6 class="text-primary"><?= __('NIP') ?></h6>
                        <p><?= $this->Number->format($fatura->nip) ?></p>
                    </div>
                    <div class="col-4">
                        <h6 class="text-primary"><?= __('Entidade Judicial') ?></h6>
                        <p><?= $this->Number->format($fatura->id_entidade) ?></p>
                    </div>
                    <div class="col-4">
                        <h6 class="text-primary"><?= __('Unidade Orgânica') ?></h6>
                        <p><?= $this->Number->format($fatura->id_unidade) ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <h6 class="text-primary"><?= __('Data Emissão') ?></h6>
                        <p><?= h($fatura->data_emissao->i18nFormat('dd-MM-yyyy')) ?></p>
                    </div>
                    <div class="col-4">
                        <h6 class="text-primary"><?= __('Estado') ?></h6>
                        <p><?= $this->Number->format(h($fatura->id_pagamento)) ?></p>
                    </div>
                    <div class="col-4">
                        <h6 class="text-primary"><?= __('Valor') ?></h6>
                        <p><?= h($fatura->valor) ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <h6 class="text-primary"><?= __('Data Pagamento') ?></h6>
                        <p><?= h($fatura->data_pagamento->i18nFormat('dd-MM-yyyy')) ?></p>
                    </div>
                    <div class="col-4">
                        <h6 class="text-primary"><?= __('Ref. Pagamento') ?></h6>
                        <p><?= h($fatura->ref_pagamento) ?></p>
                    </div>
                    <div class="col-4">
                        <h6 class="text-primary"><?= __('Ultima Alteração') ?></h6>
                        <p><?= h($fatura->ultima_alteracao) ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <h6 class="text-primary"><?= __('Utilizador') ?></h6>
                        <p><?= h($fatura->utilizador) ?></p>
                    </div>
                    <div class="col-4">
                        <h6 class="text-primary"><?= __('Data') ?></h6>
                        <p><?= h($fatura->data->i18nFormat('dd-MM-yyyy')) ?></p>
                    </div>
                    <div class="col-4">
                        <h6 class="text-primary"><?= __('Referência') ?></h6>
                        <p><?= h($fatura->referencia) ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-2">
                        <h6 class="text-primary"><?= __('Observações') ?></h6>
                        <p><?= h($fatura->observacoes) ?></p>
                    </div>
                </div>
                <?php $this->end(); ?>
            </div>
        </div>
    </div>
    <div class="card-footer card-footer-fixed">
        <a href="/faturas/index" class="btn btn-secondary float-right space-right"><?= __('Voltar') ?></a>
    </div>
</div>