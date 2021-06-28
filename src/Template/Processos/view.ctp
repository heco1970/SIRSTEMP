<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('Detalhe do Processo') ?></h6>
    </div>
    <div class="ml-3 mr-3 mb-3 mt-3">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row">
                    <div class="col-6">
                        <h6 class="text-primary"><?= __('Nome') ?></h6>
                        <p><?= h($processo->processo_id) ?></p>
                    </div>
                    <div class="col-6">
                        <h6 class="text-primary"><?= __('Id') ?></h6>
                        <p><?= h($processo->processo_id) ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-6">
                        <h6 class="text-primary"><?= __('Natureza') ?></h6>
                        <td><?= h($processo->natureza->designacao) ?></td>
                    </div>
                    <div class="col-6">
                        <h6 class="text-primary"><?= __('NIP') ?></h6>
                        <p><?= h($processo->nip) ?></p>
                    </div>
                </div>
                <?php $this->end(); ?>
            </div>
            <br>
            <ul class="nav nav-pills flex-column mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-processos-tab" data-toggle="pill" href="#pills-processos" role="tab" aria-controls="pills-processos" aria-selected="true">Pessoas Associadas</a>
                </li>
            </ul>
            <div class="tab-pane fade show active" id="pills-processos" role="tabpanel" aria-labelledby="pills-processos-tab">
                <div class="card shadow mb-2">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Data Nascimento</th>
                                <th scope="col">Cartão de Cidadão</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pessoas as $pessoa) : ?>
                                <tr>
                                    <td><?= $this->Html->link($pessoa->nome, ['controller' => 'Pessoas', 'action' => 'view', $pessoa->id]) ?></td>
                                    <td><?= h($pessoa->data_nascimento) ?></td>
                                    <td><?= h($pessoa->cc) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <ul class="nav nav-pills flex-column mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-processos-tab" data-toggle="pill" href="#pills-processos" role="tab" aria-controls="pills-processos" aria-selected="true">Crimes Associados</a>
                </li>
            </ul>
            <div class="tab-pane fade show active" id="pills-processos" role="tabpanel" aria-labelledby="pills-processos-tab">
                <div class="card shadow mb-2">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Descrição</th>
                                <th scope="col">Ocorrência</th>
                                <th scope="col">Ultima Alteração</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($crimes as $crime) : ?>
                                <tr>
                                    <td><?= $this->Html->link($crime->tipocrime->descricao, ['controller' => 'Crimes', 'action' => 'view', $crime->id]) ?></td>
                                    <td><?= h($crime->ocorrencia) ?></td>
                                    <td><?= h($crime->modified->i18nFormat('yyyy-MM-dd YY:MM')) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <div class="card-footer card-footer-fixed">
    <?php if (empty($pessoa_id)) { ?>
            <a href="/processos/index" class="btn btn-secondary float-right space-right"><?= __('Voltar') ?></a>
        <?php } else { ?>
            <a href="/pessoas/view/<?= h($pessoa_id) ?>" class="btn btn-secondary float-right space-right"><?= __('Voltar') ?></a>
        <?php } ?>
    </div>
</div>