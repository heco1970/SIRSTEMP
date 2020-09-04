<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Natureza $natureza
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Natureza'), ['action' => 'edit', $natureza->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Natureza'), ['action' => 'delete', $natureza->id], ['confirm' => __('Are you sure you want to delete # {0}?', $natureza->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Naturezas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Natureza'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Processos'), ['controller' => 'Processos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Processo'), ['controller' => 'Processos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="naturezas view large-9 medium-8 columns content">
    <h3><?= h($natureza->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Designacao') ?></th>
            <td><?= h($natureza->designacao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($natureza->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($natureza->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($natureza->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Processos') ?></h4>
        <?php if (!empty($natureza->processos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Processo Id') ?></th>
                <th scope="col"><?= __('Entidadejudiciai Id') ?></th>
                <th scope="col"><?= __('Unit Id') ?></th>
                <th scope="col"><?= __('Natureza Id') ?></th>
                <th scope="col"><?= __('Nip') ?></th>
                <th scope="col"><?= __('Observacoes') ?></th>
                <th scope="col"><?= __('Dataconclusao') ?></th>
                <th scope="col"><?= __('State Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Ultimaalteracao') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($natureza->processos as $processos): ?>
            <tr>
                <td><?= h($processos->id) ?></td>
                <td><?= h($processos->processo_id) ?></td>
                <td><?= h($processos->entidadejudiciai_id) ?></td>
                <td><?= h($processos->unit_id) ?></td>
                <td><?= h($processos->natureza_id) ?></td>
                <td><?= h($processos->nip) ?></td>
                <td><?= h($processos->observacoes) ?></td>
                <td><?= h($processos->dataconclusao) ?></td>
                <td><?= h($processos->state_id) ?></td>
                <td><?= h($processos->created) ?></td>
                <td><?= h($processos->modified) ?></td>
                <td><?= h($processos->ultimaalteracao) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Processos', 'action' => 'view', $processos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Processos', 'action' => 'edit', $processos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Processos', 'action' => 'delete', $processos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $processos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
