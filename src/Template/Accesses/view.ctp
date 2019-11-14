<div class="accesses view large-9 medium-8 columns content">
    <h3><?= h($access->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $access->has('user') ? $this->Html->link($access->user->id, ['controller' => 'Users', 'action' => 'view', $access->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Browser') ?></th>
            <td><?= h($access->browser) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Browser Version') ?></th>
            <td><?= h($access->browser_version) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Os') ?></th>
            <td><?= h($access->os) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Os Version') ?></th>
            <td><?= h($access->os_version) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Device') ?></th>
            <td><?= h($access->device) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($access->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($access->created) ?></td>
        </tr>
    </table>
</div>
