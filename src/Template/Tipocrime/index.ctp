<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tipocrime[]|\Cake\Collection\CollectionInterface $tipocrime
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tipocrime'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Crimes'), ['controller' => 'Crimes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Crime'), ['controller' => 'Crimes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tipocrime index large-9 medium-8 columns content">
    <h3><?= __('Tipocrime') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tipocrime') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tipocrime as $tipocrime): ?>
            <tr>
                <td><?= $this->Number->format($tipocrime->id) ?></td>
                <td><?= h($tipocrime->tipocrime) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tipocrime->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tipocrime->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tipocrime->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tipocrime->id)]) ?>
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
