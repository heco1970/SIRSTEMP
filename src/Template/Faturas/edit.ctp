<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fatura $fatura
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $fatura->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $fatura->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Faturas'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="faturas form large-9 medium-8 columns content">
    <?= $this->Form->create($fatura) ?>
    <fieldset>
        <legend><?= __('Edit Fatura') ?></legend>
        <?php
            echo $this->Form->control('num_fatura');
            echo $this->Form->control('nip');
            echo $this->Form->control('id_entidade');
            echo $this->Form->control('id_unidade');
            echo $this->Form->control('data_emissao');
            echo $this->Form->control('estado');
            echo $this->Form->control('valor');
            echo $this->Form->control('data_pagamento');
            echo $this->Form->control('ref_pagamento');
            echo $this->Form->control('ultima_alteracao');
            echo $this->Form->control('id_utilizador');
            echo $this->Form->control('estado_pagamento');
            echo $this->Form->control('observacoes');
            echo $this->Form->control('referencia');
            echo $this->Form->control('data');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
