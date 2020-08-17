<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pessoa $pessoa
 */
?>
<?= $this->Html->css('/vendor/dynatables/jquery.dynatable.min.css', ['block' => true]); ?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('Detalhe da Pessoa') ?></h6>
    </div>
    <div class="ml-3 mr-3 mb-3 mt-3">

        <div class="tab-content" id="pills-tabContent">
            <ul class="nav nav-pills flex-column mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Dados Pessoais</a>
                </li>
            </ul>
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row">
                    <div class="col-7">
                        <h6 class="text-primary"><?= __('Nome') ?></h6>
                        <p><?= h($pessoa->nome) ?></p>
                    </div>
                    <div class="col-5">
                        <h6 class="text-primary"><?= __('Nome Alternativo') ?></h6>
                        <p><?= h($pessoa->nome_alt) ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <h6 class="text-primary"><?= __('Nome do Pai') ?></h6>
                        <p><?= h($pessoa->nomepai) ?></p>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h6 class="text-primary"><?= __('Nome da Mãe') ?></h6>
                        <p><?= h($pessoa->nomemae) ?></p>
                        <hr>
                    </div>
                </div>
                <div class="row">

                    <div class="col-3">
                        <h6 class="text-primary"><?= __('Estado Civil') ?></h6>
                        <p><?= h($pessoa->estadocivil->estado) ?></p>
                    </div>
                    <div class="col-3">
                        <h6 class="text-primary"><?= __('Género') ?></h6>
                        <p><?= h($pessoa->genero->genero) ?></p>
                    </div>
                    <div class="col-3">
                        <h6 class="text-primary"><?= __('Nacionalidade') ?></h6>
                        <p><?= h(ucfirst(mb_strtolower($pessoa->pai->paisNome))) ?></p>

                    </div>

                </div>
                <hr>
                <div class="row">
                    <div class="col-3">
                        <h6 class="text-primary"><?= __('Código Postal') ?></h6>
                        <p><?= h($pessoa->codigos_postai->NumCodigoPostal) ?> - <?= h($pessoa->codigos_postai->ExtCodigoPostal) ?></p>
                    </div>
                    <div class="col-3">
                        <h6 class="text-primary"><?= __('Distrito') ?></h6>
                        <p><?= h($pessoa->distrito->Designacao) ?></p>
                    </div>
                    <div class="col-3">
                        <h6 class="text-primary"><?= __('Concelho') ?></h6>
                        <p><?= h($pessoa->concelho->Designacao) ?></p>
                    </div>
                    <div class="col-3">
                        <h6 class="text-primary"><?= __('Freguesia') ?></h6>
                        <p><?= h($pessoa->codigos_postai->NomeLocalidade) ?></p>

                    </div>

                </div>

                <hr>
                <div class="row">
                    <div class="col-3">
                        <h6 class="text-primary"><?= __('Data de Nascimento') ?></h6>
                        <p><?= h($pessoa->data_nascimento->i18nFormat('dd/MM/yyyy')) ?></p>
                    </div>
                    <div class="col-3">
                        <h6 class="text-primary"><?= __('Cartão de Cidadão') ?></h6>
                        <p><?= h($pessoa->cc) ?></p>
                    </div>
                    <div class="col-3">
                        <h6 class="text-primary"><?= __('Número de Contribuinte') ?></h6>
                        <p><?= h($pessoa->nif) ?></p>
                    </div>
                    <div class="col-3">
                        <h6 class="text-primary"><?= __('Outra Identificação') ?></h6>
                        <p><?= h($pessoa->outroidentifica) ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-3">
                        <h6 class="text-primary"><?= __('Centro Educacional') ?></h6>
                        <p><?= !empty($pessoa->centro_educ->designacao)? h($pessoa->centro_educ->designacao):'' ?></p>

                    </div>
                    <div class="col-3">
                        <h6 class="text-primary"><?= __('Estabelecimento Prisional') ?></h6>
                        <p><?= !empty($pessoa->estb_pri->designacao) ? h($pessoa->estb_pri->designacao):'' ?></p>

                    </div>
                </div>
                <hr>

                <div class="row">

                    <div class="col-3">
                        <h6 class="text-primary"><?= __('Criado') ?></h6>
                        <p><?= h($pessoa->created->i18nFormat('dd/MM/yyyy HH:mm:ss')) ?></p>
                    </div>
                    <div class="col-3">
                        <h6 class="text-primary"><?= __('Modificado') ?></h6>
                        <p><?= !empty($pessoa->modified) ? h($pessoa->modified->i18nFormat('dd/MM/yyyy HH:mm:ss')) : '' ?></p>
                    </div>
                    <div class="col-3">
                        <h6 class="text-primary"><?= __('Estado') ?></h6>
                        <p><?= $pessoa->estado ? __('Sim') : __('Não'); ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <h6 class="text-primary"><?= __('Observações') ?></h6>
                        <p><?= h($pessoa->observacoes) ?></p>

                    </div>
                </div>


                <br>
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
                            <a class="btn btn-success btn-circle btn-lg" href="/contactos/add/<?= h($pessoa->id);?>"><i class="fas fa-plus"></i></a>
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
                                        <th scope="row"><?= h($contacto->nome) ?></th>
                                        <td><?= h($contacto->localidade) ?></td>
                                        <td><?= h($contacto->telefone) ?></td>
                                        <td><?= h($contacto->fax) ?></td>
                                        <td><?= h($contacto->telemovel) ?></td>
                                        <td><?= $contacto->estado == 1 ? __('Ativo') : __('Não Ativo') ?></td>
                                        <td><a class="btn btn-info" href="/contactos/view/<?= h($contacto->id) ?>" data-toggle="tooltip" data-placement="top" title="<?= __('View') ?>"><i class="far fa-eye fa-fw"></i></a>
                                            <a class="btn btn-warning" href="/contactos/edit/<?= h($contacto->id) ?>" data-toggle="tooltip" data-placement="top" title="<?= __('Edit') ?>"><i class="far fa-edit fa-fw"></i></a>
                                            <a class="btn btn-danger" nclick="return confirm('Tem a certeza que quer apagar?')" href="/contactos/delete/<?= h($contacto->id) ?>" data-toggle="tooltip" data-placement="top" title="<?= __('Delete') ?>"><i class="fa fa-trash fa-fw"></i></a></td>

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
                <?php
                $dynElems =
                    ['descricao' => ['label' => ('Crime')]];
                ?>
                <?= $this->element('Dynatables/filter', ['dId' => 'dynatable', 'elements' => $dynElems]); ?>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <button id="dynatable-filter" class="btn btn-secondary btn-circle btn-lg float-right mr-2"><i class="fas fa-filter"></i></button>
                        <h6 class="m-0 font-weight-bold text-primary"><?= __('Crimes:') ?></h6>
                    </div>
                    <div class="card-body">
                        <?= $this->element('Dynatables/table', ['dId' => 'dynatable', 'elements' => $dynElems, 'actions' => false]); ?>
                    </div>
                </div>

                <?= $this->element('Modal/generic', ['eId' => 'disable', 'title' => '', 'text']); ?>

                <?= $this->Html->script('/vendor/dynatables/jquery.dynatable.min.js', ['block' => true]); ?>
                <?= $this->Html->script('/js/dynatable-helper.js', ['block' => true]); ?>

                <?php $this->start('scriptBottom') ?>
                <script>
                    $(document).ready(function() {
                        writers = {};
                        createDynatable("#dynatable", "/pessoas-crimes/indexpessoas/" + <?= h($pessoa->id) ?>, {
                            created: -1
                        }, writers);
                    });
                </script>
                <?php $this->end(); ?>
            </div>
        </div>

    </div>
</div>