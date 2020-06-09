<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserState $userState
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $userState->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $userState->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List User States'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Attempts'), ['controller' => 'Attempts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Attempt'), ['controller' => 'Attempts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userStates form large-9 medium-8 columns content">
    <?= $this->Form->create($userState) ?>
    <fieldset>
        <legend><?= __('Edit User State') ?></legend>
        <?php
            echo $this->Form->control('descri');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
