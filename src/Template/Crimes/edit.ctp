<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

    <?= $this->Form->create($crime) ?>
    <legend><?= __('Alterar Crime') ?></legend>

        <table class="table">
            <tr>
                <th scope="row"><?= __('Crime') ?></th>
                <td>
                    <?php
                       echo $this->Form->text('descricao', ['required' => true]);
                    ?>
                </td>
            </tr>
           
        </table>

    </div>
    <button class="btn btn-success btn-lg" type="submit">Alterar</button>
    <?= $this->Form->end() ?>
    
</div>