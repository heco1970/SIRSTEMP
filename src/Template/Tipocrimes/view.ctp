<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('Detalhe do Tipo de Crime') ?></h6>
    </div>
    <div class="ml-3 mr-3 mb-3 mt-3">

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row">
                    <div class="col">
                        <h6 class="text-primary"><?= __('Descrição') ?></h6>
                        <td><?= h($tipocrime->descricao) ?></td>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-6">
                        <h6 class="text-primary"><?= __('Criado') ?></h6>
                        <p><?= h($tipocrime->created->i18nFormat('dd/MM/yyyy HH:mm:ss')) ?></p>

                    </div>
                    <div class="col-6">
                        <h6 class="text-primary"><?= __('Modificado') ?></h6>
                        <p><?= h($tipocrime->modified->i18nFormat('dd/MM/yyyy HH:mm:ss')) ?></p>
                    </div>
                </div>
                <a href="/tipocrimes/index" class="btn btn-secondary float-right space-right"><?= __('Voltar') ?></a>
                <?php $this->end(); ?>
            </div>
        </div>
    </div>
</div>