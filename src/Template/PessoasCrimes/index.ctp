<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PessoasCrime[]|\Cake\Collection\CollectionInterface $pessoasCrimes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pessoas Crime'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Crimes'), ['controller' => 'Crimes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Crime'), ['controller' => 'Crimes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pessoasCrimes index large-9 medium-8 columns content">
    <h3><?= __('Pessoas Crimes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('pessoas_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('crimes_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pessoasCrimes as $pessoasCrime): ?>
            <tr>
                <td><?= $pessoasCrime->has('pessoa') ? $this->Html->link($pessoasCrime->pessoa->id, ['controller' => 'Pessoas', 'action' => 'view', $pessoasCrime->pessoa->id]) : '' ?></td>
                <td><?= $pessoasCrime->has('crime') ? $this->Html->link($pessoasCrime->crime->id, ['controller' => 'Crimes', 'action' => 'view', $pessoasCrime->crime->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pessoasCrime->pessoas_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pessoasCrime->pessoas_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pessoasCrime->pessoas_id], ['confirm' => __('Are you sure you want to delete # {0}?', $pessoasCrime->pessoas_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
