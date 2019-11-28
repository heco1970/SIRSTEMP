<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Verbete $verbete
 */
?>

<div class="verbetes form large-9 medium-8 columns content">
    <?= $this->Form->create($verbete) ?>
    <fieldset>
        <legend><?= __('Add Verbete') ?></legend>
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
