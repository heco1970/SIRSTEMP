<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PessoasCrime $pessoasCrime
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pessoas Crime'), ['action' => 'edit', $pessoasCrime->pessoas_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pessoas Crime'), ['action' => 'delete', $pessoasCrime->pessoas_id], ['confirm' => __('Are you sure you want to delete # {0}?', $pessoasCrime->pessoas_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pessoas Crimes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pessoas Crime'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Crimes'), ['controller' => 'Crimes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Crime'), ['controller' => 'Crimes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pessoasCrimes view large-9 medium-8 columns content">
    <h3><?= h($pessoasCrime->pessoas_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Pessoa') ?></th>
            <td><?= $pessoasCrime->has('pessoa') ? $this->Html->link($pessoasCrime->pessoa->id, ['controller' => 'Pessoas', 'action' => 'view', $pessoasCrime->pessoa->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Crime') ?></th>
            <td><?= $pessoasCrime->has('crime') ? $this->Html->link($pessoasCrime->crime->id, ['controller' => 'Crimes', 'action' => 'view', $pessoasCrime->crime->id]) : '' ?></td>
        </tr>
    </table>
</div>
