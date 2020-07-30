<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Entidadejudiciai $entidadejudiciai
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Entidadejudiciais'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="entidadejudiciais form large-9 medium-8 columns content">
    <?= $this->Form->create($entidadejudiciai) ?>
    <fieldset>
        <legend><?= __('Add Entidadejudiciai') ?></legend>
        <?php
            echo $this->Form->control('descricao');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
