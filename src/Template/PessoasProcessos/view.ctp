<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PessoasProcesso $pessoasProcesso
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pessoas Processo'), ['action' => 'edit', $pessoasProcesso->pessoas_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pessoas Processo'), ['action' => 'delete', $pessoasProcesso->pessoas_id], ['confirm' => __('Are you sure you want to delete # {0}?', $pessoasProcesso->pessoas_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pessoas Processos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pessoas Processo'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Processos'), ['controller' => 'Processos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Processo'), ['controller' => 'Processos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pessoasProcessos view large-9 medium-8 columns content">
    <h3><?= h($pessoasProcesso->pessoas_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Pessoa') ?></th>
            <td><?= $pessoasProcesso->has('pessoa') ? $this->Html->link($pessoasProcesso->pessoa->nome, ['controller' => 'Pessoas', 'action' => 'view', $pessoasProcesso->pessoa->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Processo') ?></th>
            <td><?= $pessoasProcesso->has('processo') ? $this->Html->link($pessoasProcesso->processo->nip, ['controller' => 'Processos', 'action' => 'view', $pessoasProcesso->processo->id]) : '' ?></td>
        </tr>
    </table>
</div>
