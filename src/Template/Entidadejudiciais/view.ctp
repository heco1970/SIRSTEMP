<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('Detalhe de Entidade judicial') ?></h6>
    </div>
    <div class="ml-3 mr-3 mb-3 mt-3">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row">
                    <div class="col">
                        <h6 class="text-primary"><?= __('Descrição') ?></h6>
                        <td><?= h($entidadejudiciai->descricao) ?></td>
                    </div>
                </div>
                <a href="/entidadejudiciais/index" class="btn btn-secondary float-right space-right"><?= __('Voltar') ?></a>
                <?php $this->end(); ?>
            </div>
        </div>
    </div>
</div>