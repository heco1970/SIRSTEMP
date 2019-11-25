<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Processo $processo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $processo->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $processo->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Processos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Units'), ['controller' => 'Units', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Unit'), ['controller' => 'Units', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List States'), ['controller' => 'States', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New State'), ['controller' => 'States', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="processos form large-9 medium-8 columns content">
    <?= $this->Form->create($processo) ?>
    <fieldset>
        <legend><?= __('Edit Processo') ?></legend>
        <?php
            echo $this->Form->control('entjudicial');
            echo $this->Form->control('unit_id', ['options' => $units]);
            echo $this->Form->control('natureza');
            echo $this->Form->control('nip');
            echo $this->Form->control('observacoes');
            echo $this->Form->control('dataconclusao');
            echo $this->Form->control('state_id', ['options' => $states]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
