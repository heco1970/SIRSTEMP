<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

    <?= $this->Form->create($attempt) ?>
    <legend><?= __('Adicionar Attempt') ?></legend>

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
                <th scope="row"><?= __('Estado') ?></th>
                <td>
                    <?php
                        echo $this->Form->select('user_states_id', $states);
                    ?>
                </td>
            </tr>
        </table>

    </div>
    <button class="btn btn-success btn-lg" type="submit">Adicionar</button>
    <?= $this->Form->end() ?>
    
</div>
