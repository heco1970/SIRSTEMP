<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('Detalhe de User Perfil') ?></h6>
    </div>
    <div class="ml-3 mr-3 mb-3 mt-3">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row">
                    <div class="col">
                        <h6 class="text-primary"><?= __('Username') ?></h6>
                        <td><?= h($userPerfi->user->username) ?></td>
                    </div>
                    <div class="col">
                        <h6 class="text-primary"><?= __('Perfil') ?></h6>
                        <td><?= h($userPerfi->perfi->perfil) ?></td>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <h6 class="text-primary"><?= __('Criado') ?></h6>
                        <td><?= h($userPerfi->created->i18nFormat('dd/MM/yyyy HH:mm:ss')) ?></td>
                    </div>
                    <div class="col">
                        <h6 class="text-primary"><?= __('Modificado') ?></h6>
                        <td><?= h($userPerfi->modified->i18nFormat('dd/MM/yyyy HH:mm:ss')) ?></td>
                    </div>
                </div>
                <a href="/user-perfis/index" class="btn btn-secondary float-right space-right"><?= __('Voltar') ?></a>
                <?php $this->end(); ?>
            </div>
        </div>
    </div>
</div>