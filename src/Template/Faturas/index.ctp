<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fatura[]|\Cake\Collection\CollectionInterface $faturas
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Fatura'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="faturas index large-9 medium-8 columns content">
    <h3><?= __('Faturas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('num_fatura') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nip') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_entidade') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_unidade') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_emissao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('valor') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_pagamento') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ref_pagamento') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ultima_alteracao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('utilizador') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_pagamento') ?></th>
                <th scope="col"><?= $this->Paginator->sort('observacoes') ?></th>
                <th scope="col"><?= $this->Paginator->sort('referencia') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($faturas as $fatura): ?>
            <tr>
                <td><?= $this->Number->format($fatura->id) ?></td>
                <td><?= h($fatura->num_fatura) ?></td>
                <td><?= $this->Number->format($fatura->nip) ?></td>
                <td><?= $this->Number->format($fatura->id_entidade) ?></td>
                <td><?= $this->Number->format($fatura->id_unidade) ?></td>
                <td><?= h($fatura->data_emissao) ?></td>
                <td><?= h($fatura->valor) ?></td>
                <td><?= h($fatura->data_pagamento) ?></td>
                <td><?= h($fatura->ref_pagamento) ?></td>
                <td><?= h($fatura->ultima_alteracao) ?></td>
                <td><?= h($fatura->utilizador) ?></td>
                <td><?= $this->Number->format($fatura->id_pagamento) ?></td>
                <td><?= h($fatura->observacoes) ?></td>
                <td><?= h($fatura->referencia) ?></td>
                <td><?= h($fatura->data) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $fatura->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $fatura->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $fatura->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fatura->id)]) ?>
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
