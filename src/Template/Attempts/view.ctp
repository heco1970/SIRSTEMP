<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

    <h3><?= h($attempt->username) ?></h3>

        <table class="table">
            <tr>
                <th scope="row"><?= __('Username') ?></th>
                <td><?= h($attempt->username) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Ban') ?></th>
                <td>
                    <?= ($attempt->ban) ? "Banido" : (($attempt->ban) ? "No" : "Ativo") ?>
                </td>
            </tr>
            <tr>
                <th scope="row"><?= __('Suspenso') ?></th>
                <td><?= h($attempt->suspenso->i18nFormat('dd-MM-yyyy HH:mm:ss')) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Modified') ?></th>
                <td><?= h($attempt->modified->i18nFormat('dd-MM-yyyy HH:mm:ss')) ?></td>
            </tr>
        </table>

    </div>
    
</div>
