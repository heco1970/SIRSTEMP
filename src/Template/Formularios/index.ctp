<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Formulario[]|\Cake\Collection\CollectionInterface $formularios
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Formulario'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="formularios index large-9 medium-8 columns content">
    <h3><?= __('Formularios') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_equipa') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_pedido') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dr_ds') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nome_prestador_trabalho') ?></th>
                <th scope="col"><?= $this->Paginator->sort('designacao_entidade') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hora_aplicadas') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hora_prestadas') ?></th>
                <th scope="col"><?= $this->Paginator->sort('actividade_exercida') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_fim_execucao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tecnico') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($formularios as $formulario): ?>
            <tr>
                <td><?= $this->Number->format($formulario->id) ?></td>
                <td><?= $this->Number->format($formulario->id_equipa) ?></td>
                <td><?= $this->Number->format($formulario->id_pedido) ?></td>
                <td><?= h($formulario->dr_ds) ?></td>
                <td><?= h($formulario->nome_prestador_trabalho) ?></td>
                <td><?= h($formulario->designacao_entidade) ?></td>
                <td><?= $this->Number->format($formulario->hora_aplicadas) ?></td>
                <td><?= $this->Number->format($formulario->hora_prestadas) ?></td>
                <td><?= h($formulario->actividade_exercida) ?></td>
                <td><?= h($formulario->data_fim_execucao) ?></td>
                <td><?= h($formulario->data) ?></td>
                <td><?= h($formulario->tecnico) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $formulario->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $formulario->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $formulario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formulario->id)]) ?>
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
