<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('Detalhe Seguro Tutelar Educativo') ?></h6>
    </div>
    <div class="ml-3 mr-3 mb-3 mt-3">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row">
                    <div class="col-2">
                        <h6 class="text-primary"><?= __('Id Pedido') ?></h6>
                        <p><?= $this->Number->format($tutelareducativo->id_pedido) ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <h6 class="text-primary"><?= __('Equipa') ?></h6>
                        <p><?= h($tutelareducativo->team->nome) ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-10">
                        <h6 class="text-primary"><?= __('Nome do Jovem') ?></h6>
                        <p><?= h($tutelareducativo->nome_jovem) ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <h6 class="text-primary"><?= __('Data de Nascimento') ?></h6>
                        <p><?= h($tutelareducativo->data_nascimento->i18nFormat('dd-MM-yyyy')) ?></p>
                    </div>
                    <div class="col-4">
                        <h6 class="text-primary"><?= __('NIF') ?></h6>
                        <p><?= h($tutelareducativo->nif) ?></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-10">
                        <h6 class="text-primary"><?= __('Designação da Entidade Beneficiária da Tarefa') ?>
                        </h6>
                        <p><?= h($tutelareducativo->designacao_entidade) ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <h6 class="text-primary"><?= __('Data Inicio') ?></h6>
                        <p><?= h($tutelareducativo->data_inicio->i18nFormat('dd-MM-yyyy')) ?></p>
                    </div>
                </div>
                <?php $this->end(); ?>
            </div>
        </div>
    </div>
    <div class="card-footer card-footer-fixed">
        <a href="/tutelareducativos/edit/<?= h($tutelareducativo->id) ?>" class="btn btn-warning float-right space-right"><?= __('Editar') ?></a>
        <a href="/tutelareducativos/index" class="btn btn-secondary float-right space-right"><?= __('Voltar') ?></a>
    </div>
</div>