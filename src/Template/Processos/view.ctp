<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('Detalhe do Processo') ?></h6>
    </div>
    <div class="ml-3 mr-3 mb-3 mt-3">

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row">
                    <div class="col-4">
                        <h6 class="text-primary"><?= __('ID') ?></h6>
                        <p><?= h($processo->processo_id) ?></p>
                    </div>
                    <div class="col-4">
                        <h6 class="text-primary"><?= __('Nip') ?></h6>
                        <p><?= h($processo->nip) ?></p>
                    </div>
                    <div class="col-4">
                        <h6 class="text-primary"><?= __('Entidade judicial') ?></h6>
                        <td><?= $processo->has('entidadejudiciai') ? $this->Html->link($processo->entidadejudiciai->descricao, ['controller' => 'Entidadejudiciais', 'action' => 'view', $processo->entidadejudiciai->id]) : '' ?></td>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <h6 class="text-primary"><?= __('Unidade Orgânica') ?></h6>
                        <td><?= h($processo->unit->designacao) ?></td>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h6 class="text-primary"><?= __('Estado') ?></h6>
                        <td><?= h($processo->state->designacao) ?></td>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <h6 class="text-primary"><?= __('Natureza') ?></h6>
                        <td><?= h($processo->natureza) ?></td>
                    </div>
                    <div class="col-4">
                        <h6 class="text-primary"><?= __('Data de Conclusão') ?></h6>
                        <td><?= h($processo->dataconclusao->i18nFormat('dd/MM/yyyy')) ?></td>
                    </div>
                    <div class="col-4">
                        <h6 class="text-primary"><?= __('Criado') ?></h6>
                        <td><?= h($processo->created->i18nFormat('dd/MM/yyyy HH:mm:ss')) ?></td>
                    </div>
                </div>

                <?php $this->end(); ?>
            </div>
        </div>

    </div>
</div>