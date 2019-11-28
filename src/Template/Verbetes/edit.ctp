<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Verbete $verbete
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $verbete->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $verbete->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Verbetes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Estados'), ['controller' => 'Estados', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Estado'), ['controller' => 'Estados', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="verbetes form large-9 medium-8 columns content">
    <?= $this->Form->create($verbete) ?>
    <fieldset>
        <legend><?= __('Edit Verbete') ?></legend>
        <?php
            echo $this->Form->control('pessoa_id', ['options' => $pessoas]);
            echo $this->Form->control('nip');
            echo $this->Form->control('datacriacao');
            echo $this->Form->control('datadistribuicao');
            echo $this->Form->control('datainicioefectiva');
            echo $this->Form->control('dataefectivatermino');
            echo $this->Form->control('datainiciop');
            echo $this->Form->control('dataprevistat');
            echo $this->Form->control('ep');
            echo $this->Form->control('observacoes');
            echo $this->Form->control('estado_id', ['options' => $estados]);
            echo $this->Form->control('motivo');
            echo $this->Form->control('concluidof');
            echo $this->Form->control('pedido_id', ['options' => $pedidos]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
