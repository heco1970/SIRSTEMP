<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Perfi $perfi
 */
?>


<div class="tab-content" id="pills-tabContent">
    <ul class="nav nav-pills flex-column mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Detalhe do Perfil</a>
        </li>
    </ul>
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <table class="table">
            <tr>
                <th scope="row" class="text-primary"><?= __('Nome') ?></th>
                <td><?= h($perfi->perfil) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Criado') ?></th>
                <td><?= h($perfi->created->i18nFormat('dd/MM/yyyy HH:mm:ss')) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Modificado') ?></th>
                <td><?= h($perfi->modified->i18nFormat('dd/MM/yyyy HH:mm:ss')) ?></td>
            </tr>

        </table>
    </div>
    <a href="/perfis/index" class="btn btn-secondary"><?= __('Voltar') ?></a>
    
</div>