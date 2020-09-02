<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Perfi $perfi
 */
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('Detalhe do Perfil') ?></h6>
    </div>
    <div class="ml-3 mr-3 mb-3 mt-3">


        <div class="tab-content" id="pills-tabContent">
            <ul class="nav nav-pills flex-column mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <p class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Perfil - <?= h($perfi->perfil) ?> </p>
                </li>
            </ul>
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row">
                    <div class="col">
                        <h6 class="text-primary"><?= __('Designação') ?></h6>
                        <p><?= h($perfi->perfil) ?></p>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <h6 class="text-primary"><?= __('Criado') ?></h6>
                        <p><?= h($perfi->created->i18nFormat('dd/MM/yyyy HH:mm:ss')) ?></p>

                    </div>
                    <div class="col-6">
                        <h6 class="text-primary"><?= __('Modificado') ?></h6>
                        <p><?= h($perfi->modified->i18nFormat('dd/MM/yyyy HH:mm:ss')) ?></p>

                    </div>
                </div>

                <ul class="nav nav-pills flex-column mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <p class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Utilizadores</p>
                    </li>
                </ul>
                <div class="tab-pane fade show active" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <div class="card shadow mb-2">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Username</th>
                                    <th scope="col">Nome</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($perfi->users as $row) : ?>
                                    <tr>
                                        <td><?= h($row->username) ?></th>
                                        <td><?= h($row->name) ?></td>

                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
        <div class="card-footer py-3">
            <a href="/perfis/index" class="btn btn-secondary"><?= __('Voltar') ?></a>
        </div>
    </div>