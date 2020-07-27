<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserPerfi $userPerfi
 */
?>

<div class="tab-content" id="pills-tabContent">
    <ul class="nav nav-pills flex-column mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Detalhe do Perfil de Utilizador</a>
        </li>
    </ul>
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <table class="table">
            <tr>
                <th scope="row" class="text-primary"><?= __('Username') ?></th>
                <td><?= h($userPerfi->user->username) ?></td>
            </tr>
            <tr>
                <th scope="row" class="text-primary"><?= __('Perfil') ?></th>
                <td><?= h($userPerfi->perfi->perfil) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Criado') ?></th>
                <td><?= h($userPerfi->created->i18nFormat('dd/MM/yyyy HH:mm:ss')) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Modificado') ?></th>
                <td><?= h($userPerfi->modified->i18nFormat('dd/MM/yyyy HH:mm:ss')) ?></td>
            </tr>

        </table>
    </div>
    <a href="/user-perfis/index" class="btn btn-secondary"><?= __('Voltar') ?></a>
    
</div>
