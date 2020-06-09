<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserState $userState
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User State'), ['action' => 'edit', $userState->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User State'), ['action' => 'delete', $userState->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userState->id)]) ?> </li>
        <li><?= $this->Html->link(__('List User States'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User State'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Attempts'), ['controller' => 'Attempts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Attempt'), ['controller' => 'Attempts', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="userStates view large-9 medium-8 columns content">
    <h3><?= h($userState->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descri') ?></th>
            <td><?= h($userState->descri) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($userState->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Attempts') ?></h4>
        <?php if (!empty($userState->attempts)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Username') ?></th>
                <th scope="col"><?= __('Count') ?></th>
                <th scope="col"><?= __('Suspenso') ?></th>
                <th scope="col"><?= __('Estado') ?></th>
                <th scope="col"><?= __('User State Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($userState->attempts as $attempts): ?>
            <tr>
                <td><?= h($attempts->id) ?></td>
                <td><?= h($attempts->username) ?></td>
                <td><?= h($attempts->count) ?></td>
                <td><?= h($attempts->suspenso) ?></td>
                <td><?= h($attempts->estado) ?></td>
                <td><?= h($attempts->user_state_id) ?></td>
                <td><?= h($attempts->created) ?></td>
                <td><?= h($attempts->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Attempts', 'action' => 'view', $attempts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Attempts', 'action' => 'edit', $attempts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Attempts', 'action' => 'delete', $attempts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $attempts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
