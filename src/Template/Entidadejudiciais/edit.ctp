<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

<?= $this->Form->create($entidadejudiciai) ?>
    <legend><?= __('Alterar Entidades judicial') ?></legend>

        <table class="table">
            <tr>
                <th scope="row"><?= __('Designação') ?></th>
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