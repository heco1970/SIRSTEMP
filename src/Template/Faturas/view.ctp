<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fatura $fatura
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Fatura'), ['action' => 'edit', $fatura->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Fatura'), ['action' => 'delete', $fatura->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fatura->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Faturas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fatura'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="faturas view large-9 medium-8 columns content">
    <h3><?= h($fatura->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Num Fatura') ?></th>
            <td><?= h($fatura->num_fatura) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Valor') ?></th>
            <td><?= h($fatura->valor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ref Pagamento') ?></th>
            <td><?= h($fatura->ref_pagamento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ultima Alteracao') ?></th>
            <td><?= h($fatura->ultima_alteracao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Utilizador') ?></th>
            <td><?= h($fatura->utilizador) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Observacoes') ?></th>
            <td><?= h($fatura->observacoes) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Referencia') ?></th>
            <td><?= h($fatura->referencia) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($fatura->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nip') ?></th>
            <td><?= $this->Number->format($fatura->nip) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Entidade') ?></th>
            <td><?= $this->Number->format($fatura->id_entidade) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Unidade') ?></th>
            <td><?= $this->Number->format($fatura->id_unidade) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Pagamento') ?></th>
            <td><?= $this->Number->format($fatura->id_pagamento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Emissao') ?></th>
            <td><?= h($fatura->data_emissao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Pagamento') ?></th>
            <td><?= h($fatura->data_pagamento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data') ?></th>
            <td><?= h($fatura->data) ?></td>
        </tr>
    </table>
</div>
