<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Verbete $verbete
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Verbetes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="verbetes form large-9 medium-8 columns content">
    <?= $this->Form->create($verbete) ?>
    <fieldset>
        <legend><?= __('Add Verbete') ?></legend>
        <?php
            echo $this->Form->control('id_verbetes');
            echo $this->Form->control('equipa');
            echo $this->Form->control('dr_ds');
            echo $this->Form->control('nome');
            echo $this->Form->control('designacao');
            echo $this->Form->control('hora_aplicada');
            echo $this->Form->control('hora_prevista');
            echo $this->Form->control('actividade');
            echo $this->Form->control('data_fim_execucao');
            echo $this->Form->control('data');
            echo $this->Form->control('tecnico');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
