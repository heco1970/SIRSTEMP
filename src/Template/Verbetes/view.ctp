<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Verbete $verbete
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Verbete'), ['action' => 'edit', $verbete->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Verbete'), ['action' => 'delete', $verbete->id], ['confirm' => __('Are you sure you want to delete # {0}?', $verbete->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Verbetes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Verbete'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Estados'), ['controller' => 'Estados', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Estado'), ['controller' => 'Estados', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="verbetes view large-9 medium-8 columns content">
    <h3><?= h($verbete->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Pessoa') ?></th>
            <td><?= $verbete->has('pessoa') ? $this->Html->link($verbete->pessoa->id, ['controller' => 'Pessoas', 'action' => 'view', $verbete->pessoa->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nip') ?></th>
            <td><?= h($verbete->nip) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ep') ?></th>
            <td><?= h($verbete->ep) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Observacoes') ?></th>
            <td><?= h($verbete->observacoes) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Estado') ?></th>
            <td><?= $verbete->has('estado') ? $this->Html->link($verbete->estado->id, ['controller' => 'Estados', 'action' => 'view', $verbete->estado->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Motivo') ?></th>
            <td><?= h($verbete->motivo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pedido') ?></th>
            <td><?= $verbete->has('pedido') ? $this->Html->link($verbete->pedido->id, ['controller' => 'Pedidos', 'action' => 'view', $verbete->pedido->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($verbete->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Datacriacao') ?></th>
            <td><?= h($verbete->datacriacao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Datadistribuicao') ?></th>
            <td><?= h($verbete->datadistribuicao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Datainicioefectiva') ?></th>
            <td><?= h($verbete->datainicioefectiva) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dataefectivatermino') ?></th>
            <td><?= h($verbete->dataefectivatermino) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Datainiciop') ?></th>
            <td><?= h($verbete->datainiciop) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dataprevistat') ?></th>
            <td><?= h($verbete->dataprevistat) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($verbete->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($verbete->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Concluidof') ?></h4>
        <?= $this->Text->autoParagraph(h($verbete->concluidof)); ?>
    </div>
</div>
