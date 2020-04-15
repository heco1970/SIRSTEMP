<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

    <?= $this->Form->create($attempt) ?>
    <legend><?= __('Edit Attempt') ?></legend>

        <table class="table">
            <tr>
                <th scope="row"><?= __('Username') ?></th>
                <td>
                    <?php
                       echo $this->Form->text('username', ['required' => true]);
                    ?>
                </td>
            </tr>
            <tr>
                <th scope="row"><?= __('Ban') ?></th>
                <td>
                    <?php
                        echo $this->Form->checkbox('ban', ['type' => 'checkbox'], ['required' => false]);
                    ?>
                </td>
            </tr>
        </table>

    </div>
    <button class="btn btn-success btn-lg" type="submit">Alterar</button>
    <?= $this->Form->end() ?>
    
</div>

