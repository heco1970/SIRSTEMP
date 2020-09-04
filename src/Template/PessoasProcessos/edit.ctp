<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PessoasProcesso $pessoasProcesso
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pessoasProcesso->pessoas_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pessoasProcesso->pessoas_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pessoas Processos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Processos'), ['controller' => 'Processos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Processo'), ['controller' => 'Processos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pessoasProcessos form large-9 medium-8 columns content">
    <?= $this->Form->create($pessoasProcesso) ?>
    <fieldset>
        <legend><?= __('Edit Pessoas Processo') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
