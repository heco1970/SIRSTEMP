
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pessoa $pessoa
 */
?>

<div class="alert alert-success" role="alert">
    Detalhes do Processo
</div>
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Dados do Processo</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Pessoas</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Crimes</a>
    </li>


</ul>
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

        <table class="table">
            <tr>
                <th scope="row"><?= __('Entjudicial') ?></th>
                <td><?= h($processo->entjudicial) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Unit') ?></th>
                <td><?= $processo->has('unit') ? $this->Html->link($processo->unit->id, ['controller' => 'Units', 'action' => 'view', $processo->unit->id]) : '' ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Nip') ?></th>
                <td><?= h($processo->nip) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('State') ?></th>
                <td><?= $processo->has('state') ? $this->Html->link($processo->state->id, ['controller' => 'States', 'action' => 'view', $processo->state->id]) : '' ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Id') ?></th>
                <td><?= $this->Number->format($processo->id) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Natureza') ?></th>
                <td><?= $this->Number->format($processo->natureza) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Dataconclusao') ?></th>
                <td><?= h($processo->dataconclusao) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Created') ?></th>
                <td><?= h($processo->created) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Modified') ?></th>
                <td><?= h($processo->modified) ?></td>
            </tr>
        </table>


    </div>
    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

        <div class="card shadow mb-2">
            <div class="card-header py-3">
                <a class="btn btn-success btn-circle btn-lg" href="/units/add"><i class="fas fa-plus"></i></a>
                <button id="dynatable-filter" class="btn btn-secondary btn-circle btn-lg float-right"><i class="fas fa-filter"></i></button>
            </div>

        </div>
    </div>
    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
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
                    <td><button type="button" class="btn btn-default btn-circle"><i class="fa fa-check"></i>
                        </button></td>
                    <td></td>
                    <td>66</td>
                </tr>

                </tbody>
            </table>


        </div>
    </div>


