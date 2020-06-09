<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

    <h3><?= h($attempt->username) ?></h3>

        <table class="table">
            <tr>
                <th scope="row"><?= __('Username') ?></th>
                <td><?= h($attempt->username) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Estado') ?></th>
                <td>
                    <?= h($attempt->user_state->descri) ?>
                </td>
            </tr>
            <?php if($attempt->user_states_id == 3): ?>
                <tr>
                    <th scope="row"><?= __('Suspenso') ?></th>
                    <td><?= h($attempt->suspenso->i18nFormat('dd/MM/yyyy HH:mm:ss')) ?></td>
                </tr>
            <?php endif ?>
            <tr>
                <th scope="row"><?= __('Modified') ?></th>
                <td><?= h($attempt->modified->i18nFormat('dd/MM/yyyy HH:mm:ss')) ?></td>
            </tr>
        </table>
        <?php $this->log($attempt); ?>
    </div>
    
</div>
