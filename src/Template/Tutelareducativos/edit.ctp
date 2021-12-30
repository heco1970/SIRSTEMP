<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tutelareducativo $tutelareducativo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tutelareducativo->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tutelareducativo->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Tutelareducativos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="tutelareducativos form large-9 medium-8 columns content">
    <?= $this->Form->create($tutelareducativo) ?>
    <fieldset>
        <legend><?= __('Edit Tutelareducativo') ?></legend>
        <?php
            echo $this->Form->control('id_pedido');
            echo $this->Form->control('id_equipa');
            echo $this->Form->control('nome_jovem');
            echo $this->Form->control('nif');
            echo $this->Form->control('data_nascimento');
            echo $this->Form->control('designacao_entidade');
            echo $this->Form->control('data_inicio');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
