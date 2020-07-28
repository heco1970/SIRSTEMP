<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

    <h3><?=  h($team->nome) ?></h3>

        <table class="table">
            <tr>
                <th scope="row"><?= __('Nome') ?></th>
                <td><?=  h($team->nome) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Criado') ?></th>
                <td><?= h($team->created->i18nFormat('dd/MM/yyyy HH:mm:ss')) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Alterado') ?></th>
                <td><?= h($team->modified->i18nFormat('dd/MM/yyyy HH:mm:ss')) ?></td>
            </tr>
        </table>

    <h4>Utilizadores da equipa</h4>
    
        <table class="table">
            <?php foreach($team->users as $row) : ?>
                <tr>
                    <th scope="row"><?= __('Utilizadores') ?></th>
                    <td><?= h($row->username) ?></td>
                </tr>
            <?php endforeach ?>
        </table>
            
    </div>

    <?php $this->log($team); ?>
    
    
</div>

