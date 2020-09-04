<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tipocrime $tipocrime
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tipocrime'), ['action' => 'edit', $tipocrime->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tipocrime'), ['action' => 'delete', $tipocrime->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tipocrime->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tipocrimes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tipocrime'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Crimes'), ['controller' => 'Crimes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Crime'), ['controller' => 'Crimes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tipocrimes view large-9 medium-8 columns content">
    <h3><?= h($tipocrime->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descricao') ?></th>
            <td><?= h($tipocrime->descricao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($tipocrime->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Crimes') ?></h4>
        <?php if (!empty($tipocrime->crimes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Processo Id') ?></th>
                <th scope="col"><?= __('Ocorrencia') ?></th>
                <th scope="col"><?= __('Registo') ?></th>
                <th scope="col"><?= __('Qte') ?></th>
                <th scope="col"><?= __('Apenaspre') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Tipocrime Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tipocrime->crimes as $crimes): ?>
            <tr>
                <td><?= h($crimes->id) ?></td>
                <td><?= h($crimes->processo_id) ?></td>
                <td><?= h($crimes->ocorrencia) ?></td>
                <td><?= h($crimes->registo) ?></td>
                <td><?= h($crimes->qte) ?></td>
                <td><?= h($crimes->apenaspre) ?></td>
                <td><?= h($crimes->created) ?></td>
                <td><?= h($crimes->modified) ?></td>
                <td><?= h($crimes->tipocrime_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Crimes', 'action' => 'view', $crimes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Crimes', 'action' => 'edit', $crimes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Crimes', 'action' => 'delete', $crimes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $crimes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
