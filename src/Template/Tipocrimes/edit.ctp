<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tipocrime $tipocrime
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tipocrime->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tipocrime->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Tipocrimes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Crimes'), ['controller' => 'Crimes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Crime'), ['controller' => 'Crimes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tipocrimes form large-9 medium-8 columns content">
    <?= $this->Form->create($tipocrime) ?>
    <fieldset>
        <legend><?= __('Edit Tipocrime') ?></legend>
        <?php
            echo $this->Form->control('descricao');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
