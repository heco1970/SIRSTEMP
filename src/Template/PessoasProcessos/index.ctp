<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PessoasProcesso[]|\Cake\Collection\CollectionInterface $pessoasProcessos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pessoas Processo'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Processos'), ['controller' => 'Processos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Processo'), ['controller' => 'Processos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pessoasProcessos index large-9 medium-8 columns content">
    <h3><?= __('Pessoas Processos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('pessoas_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('processos_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pessoasProcessos as $pessoasProcesso): ?>
            <tr>
                <td><?= $pessoasProcesso->has('pessoa') ? $this->Html->link($pessoasProcesso->pessoa->nome, ['controller' => 'Pessoas', 'action' => 'view', $pessoasProcesso->pessoa->id]) : '' ?></td>
                <td><?= $pessoasProcesso->has('processo') ? $this->Html->link($pessoasProcesso->processo->nip, ['controller' => 'Processos', 'action' => 'view', $pessoasProcesso->processo->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pessoasProcesso->pessoas_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pessoasProcesso->pessoas_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pessoasProcesso->pessoas_id], ['confirm' => __('Are you sure you want to delete # {0}?', $pessoasProcesso->pessoas_id)]) ?>
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
