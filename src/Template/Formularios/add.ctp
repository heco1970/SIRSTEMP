<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Formulario $formulario
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Formularios'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="formularios form large-9 medium-8 columns content">
    <?= $this->Form->create($formulario) ?>
    <fieldset>
        <legend><?= __('Add Formulario') ?></legend>
        <?php
            echo $this->Form->control('id_equipa');
            echo $this->Form->control('id_pedido');
            echo $this->Form->control('dr_ds');
            echo $this->Form->control('nome_prestador_trabalho');
            echo $this->Form->control('designacao_entidade');
            echo $this->Form->control('hora_aplicadas');
            echo $this->Form->control('hora_prestadas');
            echo $this->Form->control('actividade_exercida');
            echo $this->Form->control('data_fim_execucao');
            echo $this->Form->control('data');
            echo $this->Form->control('tecnico');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
