<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pedido $pedido
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pedido'), ['action' => 'edit', $pedido->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pedido'), ['action' => 'delete', $pedido->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pedido->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pedidos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pedido'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Processos'), ['controller' => 'Processos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Processo'), ['controller' => 'Processos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List States'), ['controller' => 'States', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New State'), ['controller' => 'States', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pedidos view large-9 medium-8 columns content">
    <h3><?= h($pedido->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Processo') ?></th>
            <td><?= $pedido->has('processo') ? $this->Html->link($pedido->processo->id, ['controller' => 'Processos', 'action' => 'view', $pedido->processo->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pessoa') ?></th>
            <td><?= $pedido->has('pessoa') ? $this->Html->link($pedido->pessoa->id, ['controller' => 'Pessoas', 'action' => 'view', $pedido->pessoa->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Referencia') ?></th>
            <td><?= h($pedido->referencia) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Canalentrada') ?></th>
            <td><?= h($pedido->canalentrada) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Origem') ?></th>
            <td><?= h($pedido->origem) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descricao') ?></th>
            <td><?= h($pedido->descricao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Equiparesponsavel') ?></th>
            <td><?= h($pedido->equiparesponsavel) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('State') ?></th>
            <td><?= $pedido->has('state') ? $this->Html->link($pedido->state->designacao, ['controller' => 'States', 'action' => 'view', $pedido->state->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pedido->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Datarecepcao') ?></th>
            <td><?= h($pedido->datarecepcao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Termino') ?></th>
            <td><?= h($pedido->termino) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($pedido->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($pedido->modified) ?></td>
        </tr>
    </table>
</div>
