<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Formulario $formulario
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Formulario'), ['action' => 'edit', $formulario->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Formulario'), ['action' => 'delete', $formulario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formulario->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Formularios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Formulario'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="formularios view large-9 medium-8 columns content">
    <h3><?= h($formulario->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Dr Ds') ?></th>
            <td><?= h($formulario->dr_ds) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nome Prestador Trabalho') ?></th>
            <td><?= h($formulario->nome_prestador_trabalho) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Designacao Entidade') ?></th>
            <td><?= h($formulario->designacao_entidade) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Actividade Exercida') ?></th>
            <td><?= h($formulario->actividade_exercida) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tecnico') ?></th>
            <td><?= h($formulario->tecnico) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($formulario->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Equipa') ?></th>
            <td><?= $this->Number->format($formulario->id_equipa) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Pedido') ?></th>
            <td><?= $this->Number->format($formulario->id_pedido) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hora Aplicadas') ?></th>
            <td><?= $this->Number->format($formulario->hora_aplicadas) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hora Prestadas') ?></th>
            <td><?= $this->Number->format($formulario->hora_prestadas) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Fim Execucao') ?></th>
            <td><?= h($formulario->data_fim_execucao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data') ?></th>
            <td><?= h($formulario->data) ?></td>
        </tr>
    </table>
</div>
