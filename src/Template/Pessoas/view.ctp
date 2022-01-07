<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pessoa $pessoa
 */
?>
<?= $this->Html->css('/vendor/dynatables/jquery.dynatable.min.css', ['block' => true]); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="/js/multiselect.js"></script>
<div class="modal-header py-3 bg-light">
    <h4 class="m-0 font-weight-bold text-primary"><?= __('Detalhes do registo de ') ?> <?= h($pessoa->nome) ?></h4>
</div>
<div class="ml-3 mr-3 mb-3 mt-3 modal-body" style="max-height: calc(100vh - 200px); overflow-y: auto;">

    <div class="tab-content" id="pills-tabContent">
        <ul class="nav nav-pills flex-column mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Dados Pessoais</a>
            </li>
        </ul>
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="row">
                <div class="col-6">
                    <h6 class="text-primary"><?= __('Nome') ?></h6>
                    <p><?= h($pessoa->nome) ?></p>
                </div>
                <div class="col-6">
                    <h6 class="text-primary"><?= __('Nome Alternativo') ?></h6>
                    <p><?= h($pessoa->nome_alt) ?></p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-6">
                    <h6 class="text-primary"><?= __('Nome do Pai') ?></h6>
                    <p><?= h($pessoa->nomepai) ?></p>
                    <hr>
                </div>
                <div class="col-6">
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
                    <p><?= h($distrito->distrito->Designacao) ?></p>
                </div>
                <div class="col-3">
                    <h6 class="text-primary"><?= __('Concelho') ?></h6>
                    <p><?= h($concelho->Designacao) ?></p>
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
                    <p><?= !empty($pessoa->centro_educ->designacao) ? h($pessoa->centro_educ->designacao) : '' ?></p>
                </div>
                <div class="col-3">
                    <h6 class="text-primary"><?= __('Estabelecimento Prisional') ?></h6>
                    <p><?= !empty($pessoa->estb_pri->designacao) ? h($pessoa->estb_pri->designacao) : '' ?></p>

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
            <!-- <ul class="nav nav-pills flex-column mb-3" id="pills-tab" role="tablist">
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
            </div> -->

            <ul class="nav nav-pills flex-column mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-contactos-tab" data-toggle="pill" href="#pills-processos" role="tab" aria-controls="pills-contactos" aria-selected="true">Contactos</a>
                </li>
            </ul>
            <div class="tab-pane fade show active" id="pills-contactos" role="tabpanel" aria-labelledby="pills-contactos-tab">
                <div class="card shadow mb-2">
                    <div class="card-header py-3">
                        <?php echo '<a class="btn btn-success btn-circle btn-lg" href="/contactos/add/' . h($pessoa->id) . '" ><i class="fas fa-plus"></i></a>' ?>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Email</th>
                                <th scope="col">Telemóvel</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($contactos as $contacto) : ?>
                                <tr>
                                    <td><?= h($contacto->nome) ?></td>
                                    <td><?= h($contacto->email) ?></td>
                                    <td><?= h($contacto->telemovel) ?></td>
                                    <td>
                                        <a class="btn btn-info" href="/contactos/view/<?= h($contacto->id) ?>?pessoa=<?= h($pessoa->id) ?>" data-toggle="tooltip" data-placement="top" title="<?= __('View') ?>"><i class="far fa-eye fa-fw"></i></a>
                                        <a class="btn btn-warning" href="/contactos/edit/<?= h($contacto->id) ?>" data-toggle="tooltip" data-placement="top" title="<?= __('Edit') ?>"><i class="far fa-edit fa-fw"></i></a>
                                        <a class="btn btn-danger" onclick="return confirm('Tem a certeza que quer apagar?')" href="/contactos/delete/<?= h($contacto->id) ?>" data-toggle="tooltip" data-placement="top" title="<?= __('Delete') ?>"><i class="fa fa-trash fa-fw"></i></a>
                                    </td>
                                <?php endforeach; ?>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-pane fade show active" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                <ul class="nav nav-pills flex-column mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="true">Crimes</a>
                    </li>
                </ul>
                <div class="tab-pane fade show active" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">

                    <div class="card shadow mb-2">
                        <div class="card-header py-3">
                            <?php echo '<a class="btn btn-success btn-circle btn-lg" href="/crimes/add/' . h($pessoa->id) . '" ><i class="fas fa-plus"></i></a>' ?>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Tipo crime</th>
                                    <th scope="col">Nip</th>
                                    <th scope="col">Ocorrencia</th>
                                    <th scope="col">Registo</th>
                                    <th scope="col">Quantidade</th>
                                    <th scope="col">Apenas Pré</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($crimes as $crime) : ?>
                                    <tr>
                                        <th scope="row"><?= h($crime->tipocrime->descricao) ?></th>
                                        <td><?= h($crime->processo->nip) ?></td>
                                        <td><?= h($crime->ocorrencia) ?></td>
                                        <td><?= h($crime->registo) ?></td>
                                        <td><?= h($crime->qte) ?></td>
                                        <td><?= $crime->apenaspre == 1 ? __('✔') : __('✕') ?></td>
                                        <td>
                                            <a class="btn btn-info" href="/crimes/view/<?= h($crime->id) ?>?pessoa=<?= h($pessoa->id) ?>" data-toggle="tooltip" data-placement="top" title="<?= __('View') ?>"><i class="far fa-eye fa-fw"></i></a>
                                            <a class="btn btn-warning" href="/crimes/edit/<?= h($crime->id) ?>" data-toggle="tooltip" data-placement="top" title="<?= __('Edit') ?>"><i class="far fa-edit fa-fw"></i></a>
                                            <a class="btn btn-danger" onclick="return confirm('Tem a certeza que quer apagar?')" href="/crimes/delete/<?= h($crime->id) ?>" data-toggle="tooltip" data-placement="top" title="<?= __('Delete') ?>"><i class="fa fa-trash fa-fw"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <ul class="nav nav-pills flex-column mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-processos-tab" data-toggle="pill" href="#pills-processos" role="tab" aria-controls="pills-processos" aria-selected="true">Processos</a>
                        </li>
                    </ul>
                    <div class="tab-pane fade show active" id="pills-processos" role="tabpanel" aria-labelledby="pills-processos-tab">
                        <div class="card shadow mb-2">
                            <div class="card-header py-3">
                                <?php echo '<a class="btn btn-success btn-circle btn-lg" href="/pessoas-processos/add/' . h($pessoa->id) . '" ><i class="fas fa-plus"></i></a>' ?>
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
                                    <?php foreach ($processos as $processo) : ?>
                                        <tr>
                                            <th scope="row"><?= h($processo->processo_id) ?></th>
                                            <td><?= h($processo->natureza->designacao) ?></td>
                                            <td><?= h($processo->nip) ?></td>
                                            <td><?= h($processo->ultimaalteracao) ?></td>
                                            <td>
                                                <a class="btn btn-info" href="/processos/view/<?= h($processo->id) ?>?pessoa=<?= h($pessoa->id) ?>" data-toggle="tooltip" data-placement="top" title="<?= __('View') ?>"><i class="far fa-eye fa-fw"></i></a>
                                                <a class="btn btn-warning" href="/processos/edit/<?= h($processo->id) ?>?pessoa=<?= h($pessoa->id) ?>" data-toggle="tooltip" data-placement="top" title="<?= __('Edit') ?>"><i class="far fa-edit fa-fw"></i></a>
                                                <a class="btn btn-danger" onclick="return confirm('Tem a certeza que quer apagar?')" href="/processos/delete/<?= h($processo->id) ?>?pessoa=<?= h($pessoa->id) ?>" data-toggle="tooltip" data-placement="top" title="<?= __('Delete') ?>"><i class="fa fa-trash fa-fw"></i></a>
                                            </td>
                                        <?php endforeach; ?>
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
                                <?php echo '<a class="btn btn-success btn-circle btn-lg" href="/pedidos/add/' . h($pessoa->id) . '" ><i class="fas fa-plus"></i></a>' ?>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Processo</th>
                                        <th scope="col">Data de Receção</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Data termo previsto</th>
                                        <th scope="col">Data termo efetivo</th>
                                    </tr>
                                </thead>
                                <?php foreach ($pedidos as $pedido) : ?>
                                    <tr>
                                        <td><?= h($pedido->processo->processo_id) ?></td>
                                        <td><?= h($pedido->datarecepcao->i18nFormat('yyyy-MM-dd')) ?></td>
                                        <td><?= h($pedido->state->designacao) ?></td>
                                        <td><?= h($pedido->datatermoprevisto->i18nFormat('yyyy-MM-dd')) ?></td>
                                        <td><?= h($pedido->datainicioefectivo->i18nFormat('yyyy-MM-dd')) ?></td>
                                        <td>
                                            <a class="btn btn-info" href="/pedidos/view/<?= h($pedido->id) ?>?pessoa=<?= h($pessoa->id) ?>" data-toggle="tooltip" data-placement="top" title="<?= __('View') ?>"><i class="far fa-eye fa-fw"></i></a>
                                            <a class="btn btn-warning" href="/pedidos/edit/<?= h($pedido->id) ?>?pessoa=<?= h($pessoa->id) ?>" data-toggle="tooltip" data-placement="top" title="<?= __('Edit') ?>"><i class="far fa-edit fa-fw"></i></a>
                                            <a class="btn btn-danger" onclick="return confirm('Tem a certeza que quer apagar?')" href="/pedidos/delete/<?= h($pedido->id) ?>" data-toggle="tooltip" data-placement="top" title="<?= __('Delete') ?>"><i class="fa fa-trash fa-fw"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer card-footer-fixed">
        <?php if (empty($value)) { ?>
            <a href="/pessoas/edit/<?= h($pessoa->id) ?>" class="btn btn-warning float-right space-right"><?= __('Editar') ?></a>
        <?php } else { ?>
            <a href="/pessoas/edit/<?= h($pessoa->id) ?>" class="btn btn-warning float-right space-right"><?= __('Editar') ?></a>
        <?php } ?>
        <?php if (empty($value)) { ?>
            <a href="/pessoas/index" class="btn btn-secondary float-right space-right"><?= __('Voltar') ?></a>
        <?php } else { ?>
            <a href="/pessoas/view/<?= h($pessoa->pessoa_id) ?>" class="btn btn-secondary float-right space-right"><?= __('Voltar') ?></a>
        <?php } ?>
    </div>
</div>