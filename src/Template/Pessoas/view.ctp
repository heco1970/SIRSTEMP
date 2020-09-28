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
    <h4 class="m-0 font-weight-bold text-primary"><?= __('Detalhe da Pessoa') ?></h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="ml-3 mr-3 mb-3 mt-3">
    <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" onclick="show1()" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Dados Pessoais</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" onclick="show2()" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Dados Adicionais</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" onclick="show3()" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contactos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" onclick="show4()" id="pills-crim-tab" data-toggle="pill" href="#pills-crim" role="tab" aria-controls="pills-crim" aria-selected="false">Crimes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" onclick="show5()" id="pills-processos-tab" data-toggle="pill" href="#pills-processos" role="tab" aria-controls="pills-processos" aria-selected="false">Processos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" onclick="show6()" id="pills-pedidos-tab" data-toggle="pill" href="#pills-pedidos" role="tab" aria-controls="pills-pedidos" aria-selected="false">Pedidos</a>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <h4 class="mb-3 font-weight-bold"><?= __('Dados Pessoais') ?></h4>
            <hr>
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
        </div>
        <div class="tab-pane fade show active" style="display:none;" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <h4 class="mb-3 font-weight-bold"><?= __('Dados Adicionais') ?></h4>
            <hr>
            <div class="card shadow mb-2">
                <div class="card-header py-3">
                    <a class="btn btn-success btn-circle btn-lg" href="/units/add"><i class="fas fa-plus"></i></a>
                </div>
            </div>
        </div>
        <div class="tab-pane fade show active" style="display:none;" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
            <h4 class="mb-3 font-weight-bold"><?= __('Contactos') ?></h4>
            <hr>
            <div class="card shadow mb-2">
                <div class="card-header py-3">
                    <a class="btn btn-success btn-circle btn-lg" href="/contactos/add/<?= h($pessoa->id); ?>"><i class="fas fa-plus"></i></a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Localidade</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Fax</th>
                            <th scope="col">Telemóvel</th>
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
                                    <a class="btn btn-danger" onclick="return confirm('Tem a certeza que quer apagar?')" href="/contactos/delete/<?= h($contacto->id) ?>" data-toggle="tooltip" data-placement="top" title="<?= __('Delete') ?>"><i class="fa fa-trash fa-fw"></i></a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade show active" style="display:none;" id="pills-crim" role="tabpanel" aria-labelledby="pills-crim-tab">
            <h4 class="mb-3 font-weight-bold"><?= __('Crimes') ?></h4>
            <hr>
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
                                    <a class="btn btn-warning" href="/crimes/edit/<?= h($crime->id) ?>" data-toggle="tooltip" data-placement="top" title="<?= __('Edit') ?>"><i class="far fa-edit fa-fw"></i></a>
                                    <a class="btn btn-danger" onclick="return confirm('Tem a certeza que quer apagar?')" href="/crimes/delete/<?= h($crime->id) ?>" data-toggle="tooltip" data-placement="top" title="<?= __('Delete') ?>"><i class="fa fa-trash fa-fw"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade show active" style="display:none;" id="pills-processos" role="tabpanel" aria-labelledby="pills-processos-tab">
            <h4 class="mb-3 font-weight-bold"><?= __('Processos') ?></h4>
            <hr>
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
        <div class="tab-pane fade show active" style="display:none;" id="pills-pedidos" role="tabpanel" aria-labelledby="pills-pedidos-tab">
            <h4 class="mb-3 font-weight-bold"><?= __('Pedidos') ?></h4>
            <hr>
            <div class="card shadow mb-2">
                <div class="card-header py-3">
                    <?php echo '<a class="btn btn-success btn-circle btn-lg" href="/pedidos/add/' . h($pessoa->id) . '" ><i class="fas fa-plus"></i></a>' ?>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Processo</th>
                            <th scope="col">Data de Receção</th>
                            <th scope="col">Equipa Responsável</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Data termo previsto</th>
                            <th scope="col">Data termo efetivo</th>
                        </tr>
                    </thead>
                    <?php foreach ($pedidos as $pedido) : ?>
                        <tr>
                            <td><?= h($pedido->processo->processo_id) ?></td>
                            <td><?= h($pedido->datarecepcao->i18nFormat('yyyy-MM-dd')) ?></td>
                            <td><?= h($pedido->team->nome) ?></td>
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
<script>
    function show1() {
        document.getElementById("pills-home").style.display = "block";
        document.getElementById("pills-profile").style.display = "none";
        document.getElementById("pills-contact").style.display = "none";
        document.getElementById("pills-crim").style.display = "none";
        document.getElementById("pills-processos").style.display = "none";
        document.getElementById("pills-pedidos").style.display = "none";
    }

    function show2() {
        document.getElementById("pills-home").style.display = "none";
        document.getElementById("pills-profile").style.display = "block";
        document.getElementById("pills-contact").style.display = "none";
        document.getElementById("pills-crim").style.display = "none";
        document.getElementById("pills-processos").style.display = "none";
        document.getElementById("pills-pedidos").style.display = "none";
    }

    function show3() {
        document.getElementById("pills-home").style.display = "none";
        document.getElementById("pills-profile").style.display = "none";
        document.getElementById("pills-contact").style.display = "block";
        document.getElementById("pills-crim").style.display = "none";
        document.getElementById("pills-processos").style.display = "none";
        document.getElementById("pills-pedidos").style.display = "none";
    }

    function show4() {
        document.getElementById("pills-home").style.display = "none";
        document.getElementById("pills-profile").style.display = "none";
        document.getElementById("pills-contact").style.display = "none";
        document.getElementById("pills-crim").style.display = "block";
        document.getElementById("pills-processos").style.display = "none";
        document.getElementById("pills-pedidos").style.display = "none";
    }

    function show5() {
        document.getElementById("pills-home").style.display = "none";
        document.getElementById("pills-profile").style.display = "none";
        document.getElementById("pills-contact").style.display = "none";
        document.getElementById("pills-crim").style.display = "none";
        document.getElementById("pills-processos").style.display = "block";
        document.getElementById("pills-pedidos").style.display = "none";
    }

    function show6() {
        document.getElementById("pills-home").style.display = "none";
        document.getElementById("pills-profile").style.display = "none";
        document.getElementById("pills-contact").style.display = "none";
        document.getElementById("pills-crim").style.display = "none";
        document.getElementById("pills-processos").style.display = "none";
        document.getElementById("pills-pedidos").style.display = "block";
    }
</script>