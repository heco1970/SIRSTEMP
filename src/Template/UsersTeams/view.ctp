<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsersTeam $usersTeam
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Users Team'), ['action' => 'edit', $usersTeam->team_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Users Team'), ['action' => 'delete', $usersTeam->team_id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersTeam->team_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users Teams'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Users Team'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="usersTeams view large-9 medium-8 columns content">
    <h3><?= h($usersTeam->user_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $usersTeam->has('user') ? $this->Html->link($usersTeam->user->username, ['controller' => 'Users', 'action' => 'view', $usersTeam->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Team') ?></th>
            <td><?= $usersTeam->has('team') ? $this->Html->link($usersTeam->team->id, ['controller' => 'Teams', 'action' => 'view', $usersTeam->team->id]) : '' ?></td>
        </tr>
    </table>
</div>
