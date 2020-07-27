<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pessoa $pessoa
 */
?>

<div class="alert alert-success" role="alert">
    Detalhe da Pessoa
</div>

<div class="tab-content" id="pills-tabContent">
    <ul class="nav nav-pills flex-column mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Dados Pessoais</a>
        </li>
    </ul>
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <table class="table">
            <tr>
                <th scope="row" class="text-primary"><?= __('Nome') ?></th>
                <td><?= h($pessoa->nome) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Nome do Pai') ?></th>
                <td><?= h($pessoa->nomepai) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Nome da Mâe') ?></th>
                <td><?= h($pessoa->nomemae) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Pai') ?></th>
                <td><?= $pessoa->has('pai') ? $this->Html->link($pessoa->pai->paisId, ['controller' => 'Pais', 'action' => 'view', $pessoa->pai->paisId]) : '' ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Cc') ?></th>
                <td><?= h($pessoa->cc) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Outroidentifica') ?></th>
                <td><?= h($pessoa->outroidentifica) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Observacoes') ?></th>
                <td><?= h($pessoa->observacoes) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Id') ?></th>
                <td><?= $this->Number->format($pessoa->id) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Id Estadocivil') ?></th>
                <td><?= $this->Number->format($pessoa->id_estadocivil) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Id Genero') ?></th>
                <td><?= $this->Number->format($pessoa->id_genero) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Nif') ?></th>
                <td><?= $this->Number->format($pessoa->nif) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Id Unidadeopera') ?></th>
                <td><?= $this->Number->format($pessoa->id_unidadeopera) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Data Nascimento') ?></th>
                <td><?= h($pessoa->data_nascimento) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Created') ?></th>
                <td><?= h($pessoa->created) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Modified') ?></th>
                <td><?= h($pessoa->modified) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Estado') ?></th>
                <td><?= $pessoa->estado ? __('Yes') : __('No'); ?></td>
            </tr>
        </table>
    </div>

    <ul class="nav nav-pills flex-column mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="true">Dados Adicionais</a>
        </li>
    </ul>
    <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
        <div class="card shadow mb-2">
            <div class="card-header py-3">
                <a class="btn btn-success btn-circle btn-lg" href="/units/add"><i class="fas fa-plus"></i></a>

            </div>
        </div>
    </div>

    <ul class="nav nav-pills flex-column mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="true">Contactos</a>
        </li>
    </ul>
    <div class="tab-pane fade show active" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
        <div class="card shadow mb-2">
            <div class="card-header py-3">
                <a class="btn btn-success btn-circle btn-lg" href="/contactos/add"><i class="fas fa-plus"></i></a>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Localidade</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Fax</th>
                        <th scope="col">Telemovel</th>
                        <th scope="col">Estado</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($contactos as $contacto) : ?>
                        <tr>
                            <th scope="row"><?= h($pessoa->nome) ?></th>
                            <td><?= h($contacto->localidade) ?></td>
                            <td><?= h($contacto->telefone) ?></td>
                            <td><?= h($contacto->fax) ?></td>
                            <td><?= h($contacto->telemovel) ?></td>
                            <td><?= $contacto->estado == 1 ? __('Ativo') : __('Não Ativo') ?></td>
                            <td><a class="btn btn-info" href="/contactos/view/<?= h($contacto->id) ?>" data-toggle="tooltip" data-placement="top" title="<?= __('View') ?>"><i class="far fa-eye fa-fw"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <ul class="nav nav-pills flex-column mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-crim-tab" data-toggle="pill" href="#pills-crim" role="tab" aria-controls="pills-crim" aria-selected="true">Crimes</a>
            </li>
        </ul>
        <div class="tab-pane fade show active" id="pills-crim" role="tabpanel" aria-labelledby="pills-crim-tab">

            <div class="card shadow mb-2">
                <div class="card-header py-3">
                    <a class="btn btn-success btn-circle btn-lg" href="/units/add"><i class="fas fa-plus"></i></a>
                    <button id="dynatable-filter" class="btn btn-secondary btn-circle btn-lg float-right"><i class="fas fa-filter"></i></button>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id Rc</th>
                            <th scope="col">Nome</th>
                            <th scope="col">NIP</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Ocorrencia</th>
                            <th scope="col">Registo</th>
                            <th scope="col">Qte</th>
                            <th scope="col">Apenas Pré</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">333</th>
                            <td>teste de nome</td>
                            <td>2125412544</td>
                            <td>6 27 111 Tráfico de Estupefacientes</td>
                            <td></td>
                            <td></td>
                            <td>66</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

        <ul class="nav nav-pills flex-column mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-processos-tab" data-toggle="pill" href="#pills-processos" role="tab" aria-controls="pills-processos" aria-selected="true">Processos</a>
            </li>
        </ul>
        <div class="tab-pane fade show active" id="pills-processos" role="tabpanel" aria-labelledby="pills-processos-tab">
            <div class="card shadow mb-2">
                <div class="card-header py-3">
                    <a class="btn btn-success btn-circle btn-lg" href="/units/add"><i class="fas fa-plus"></i></a>
                    <button id="dynatable-filter" class="btn btn-secondary btn-circle btn-lg float-right"><i class="fas fa-filter"></i></button>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Natureza</th>
                            <th scope="col">NIP</th>
                            <th scope="col">Ultima Alteração</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <ul class="nav nav-pills flex-column mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-pedidos-tab" data-toggle="pill" href="#pills-pedidos" role="tab" aria-controls="pills-pedidos" aria-selected="true">Pedidos</a>
            </li>
        </ul>
        <div class="tab-pane fade show active" id="pills-pedidos" role="tabpanel" aria-labelledby="pills-pedidos-tab">
            <div class="card shadow mb-2">
                <div class="card-header py-3">
                    <a class="btn btn-success btn-circle btn-lg" href="/units/add"><i class="fas fa-plus"></i></a>
                    <button id="dynatable-filter" class="btn btn-secondary btn-circle btn-lg float-right"><i class="fas fa-filter"></i></button>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Referência</th>
                            <th scope="col">Utente</th>
                            <th scope="col">Processo</th>
                            <th scope="col">Equipa de Registo</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Data Recepção</th>
                            <th scope="col">Data Termo</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>31841</td>
                            <td>1661012</td>
                            <td></td>
                            <td></td>
                            <td>Ep Lisboa Penal 8</td>
                            <td>Executado</td>
                            <td>05-02-2010</td>
                            <td>05-05-2018</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <ul class="nav nav-pills flex-column mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-verbete-tab" data-toggle="pill" href="#pills-verbete" role="tab" aria-controls="pills-verbete" aria-selected="true">Verbetes</a>
            </li>
        </ul>
        <div class="tab-pane fade show active" id="pills-verbete" role="tabpanel" aria-labelledby="pills-verbete-tab">
            <div class="card shadow mb-2">
                <div class="card-header py-3">
                    <a class="btn btn-success btn-circle btn-lg" href="/units/add"><i class="fas fa-plus"></i></a>
                    <button id="dynatable-filter" class="btn btn-secondary btn-circle btn-lg float-right"><i class="fas fa-filter"></i></button>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Tipo Pedido</th>
                            <th scope="col">NIP</th>
                            <th scope="col">Equipa Atual</th>
                            <th scope="col">Data Entrada</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>