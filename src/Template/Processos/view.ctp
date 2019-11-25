<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Processo $processo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Processo'), ['action' => 'edit', $processo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Processo'), ['action' => 'delete', $processo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $processo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Processos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Processo'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Units'), ['controller' => 'Units', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Unit'), ['controller' => 'Units', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List States'), ['controller' => 'States', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New State'), ['controller' => 'States', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="processos view large-9 medium-8 columns content">
    <h3><?= h($processo->id) ?></h3>
    <table class="vertical-table">
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
    <div class="row">
        <h4><?= __('Observacoes') ?></h4>
        <?= $this->Text->autoParagraph(h($processo->observacoes)); ?>
    </div>
</div>
