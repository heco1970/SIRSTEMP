<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tutelareducativo $tutelareducativo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tutelareducativo'), ['action' => 'edit', $tutelareducativo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tutelareducativo'), ['action' => 'delete', $tutelareducativo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tutelareducativo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tutelareducativos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tutelareducativo'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tutelareducativos view large-9 medium-8 columns content">
    <h3><?= h($tutelareducativo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome Jovem') ?></th>
            <td><?= h($tutelareducativo->nome_jovem) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Designacao Entidade') ?></th>
            <td><?= h($tutelareducativo->designacao_entidade) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($tutelareducativo->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Pedido') ?></th>
            <td><?= $this->Number->format($tutelareducativo->id_pedido) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Equipa') ?></th>
            <td><?= $this->Number->format($tutelareducativo->id_equipa) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nif') ?></th>
            <td><?= $this->Number->format($tutelareducativo->nif) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Nascimento') ?></th>
            <td><?= h($tutelareducativo->data_nascimento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Inicio') ?></th>
            <td><?= h($tutelareducativo->data_inicio) ?></td>
        </tr>
    </table>
</div>
