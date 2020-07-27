<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contacto $contacto
 */
?>
<div class="alert alert-success" role="alert">
    Detalhe do Contacto
</div>

<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <table class="table">
            <tr>
                <th scope="row" class="text-primary"><?= __('Nome') ?></th>
                <td><?= $contacto->has('pessoa') ? h($contacto->pessoa->nome): '' ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Localidade') ?></th>
                <td><?= h($contacto->localidade) ?></td>
            </tr>
            <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($contacto->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefone') ?></th>
            <td><?= h($contacto->telefone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fax') ?></th>
            <td><?= h($contacto->fax) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telemovel') ?></th>
            <td><?= h($contacto->telemovel) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descricao') ?></th>
            <td><?= h($contacto->descricao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Estado') ?></th>
            <td><?= $contacto->estado == 1?__('Ativo'):__('Não Ativo') ?></td>
        </tr>
        </table>
    </div>