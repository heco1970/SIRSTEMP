<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pai $pai
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pai'), ['action' => 'edit', $pai->paisId]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pai'), ['action' => 'delete', $pai->paisId], ['confirm' => __('Are you sure you want to delete # {0}?', $pai->paisId)]) ?> </li>
        <li><?= $this->Html->link(__('List Pais'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pai'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pais view large-9 medium-8 columns content">
    <h3><?= h($pai->paisId) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('PaisNome') ?></th>
            <td><?= h($pai->paisNome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PaisName') ?></th>
            <td><?= h($pai->paisName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PaisId') ?></th>
            <td><?= $this->Number->format($pai->paisId) ?></td>
        </tr>
    </table>
</div>
