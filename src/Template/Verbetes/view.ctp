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
        <li><?= $this->Html->link(__('List Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="verbetes view large-9 medium-8 columns content">
    <h3><?= h($verbete->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Equipa') ?></th>
            <td><?= h($verbete->equipa) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dr Ds') ?></th>
            <td><?= h($verbete->dr_ds) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($verbete->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Designacao') ?></th>
            <td><?= h($verbete->designacao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Actividade') ?></th>
            <td><?= h($verbete->actividade) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tecnico') ?></th>
            <td><?= h($verbete->tecnico) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Verbetes') ?></th>
            <td><?= $this->Number->format($verbete->id_verbetes) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hora Aplicada') ?></th>
            <td><?= h($verbete->hora_aplicada) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hora Prevista') ?></th>
            <td><?= h($verbete->hora_prevista) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Fim Execucao') ?></th>
            <td><?= h($verbete->data_fim_execucao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data') ?></th>
            <td><?= h($verbete->data) ?></td>
        </tr>
    </table>
</div>
