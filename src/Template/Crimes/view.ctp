<?=$this->Html->css('/vendor/dynatables/jquery.dynatable.min.css', ['block' => true]);?>
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

    <h3><?=  h($crime->descricao) ?></h3>

        <table class="table">
            <tr>
                <th scope="row"><?= __('Descricao') ?></th>
                <td><?=  h($crime->descricao) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Criado') ?></th>
                <td><?= h($crime->created->i18nFormat('dd/MM/yyyy HH:mm:ss')) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Alterado') ?></th>
                <td><?= h($crime->modified->i18nFormat('dd/MM/yyyy HH:mm:ss')) ?></td>
            </tr>
        </table>
</div>

