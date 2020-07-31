



<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('Detalhe do Crime') ?></h6>
    </div>
    <div class="ml-3 mr-3 mb-3 mt-3">


        <div class="tab-content" id="pills-tabContent">
            <ul class="nav nav-pills flex-column mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Crime - <?= h($crime->descricao) ?> </a>
                </li>
            </ul>
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <table class="table">
                    <tr>
                        <th scope="row" class="text-primary"><?= __('Descrição') ?></th>
                        <td><?= h($crime->descricao) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Criado') ?></th>
                        <td><?= h($crime->created->i18nFormat('dd/MM/yyyy HH:mm:ss')) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Modificado') ?></th>
                        <td><?= h($crime->modified->i18nFormat('dd/MM/yyyy HH:mm:ss')) ?></td>
                    </tr>
                    <tr>
                        <th></th>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-primary"><?= h('Utilizadores') ?></th>
                        <td></td>
                    </tr>
                    <?php foreach ($crime->pessoas as $row) : ?>
                        <tr>
                            <th scope="row"><?= h($row->nome) ?></th>
                            <td></td>
                        </tr>
                    <?php endforeach ?>
                </table>
            </div>

        </div>
    </div>
    <div class="card-footer py-3">
        <a href="/crimes/index" class="btn btn-secondary"><?= __('Voltar') ?></a>
    </div>
</div>