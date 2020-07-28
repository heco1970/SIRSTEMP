<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

    <?= $this->Form->create($team) ?>
    <legend><?= __('Alterar Equipa') ?></legend>

        <table class="table">
            <tr>
                <th scope="row"><?= __('Designação') ?></th>
                <td>
                    <?php
                       echo $this->Form->text('nome', ['required' => true]);
                    ?>
                </td>
            </tr>
           
        </table>

        <h4>Utilizadores da equipa</h4>
    
        <table class="table">
            <?php foreach($team->users as $row) : ?>
                <tr>
                    <th scope="row"><?= __('Utilizadores') ?></th>
                    <td><?= h($row->username) ?></td>

                    <td><input type="checkbox" name="formDoor[]" value= <?= $row->id ?> />   </td>             
                </tr> 
            <?php endforeach ?>

        </table>

        <table class="table">            
            <th><?= __('Adicionar outro utilizador: ') ?></th>
            <th>
                <?php
                    echo $this->Form->select('user_teams', $users, ['empty' => 'Selecionar']);
                ?>
                
            </th>
        </table>
            

    </div>
    <button class="btn btn-success btn-lg" type="submit">Alterar</button>
    <?= $this->Form->end() ?>
    
</div>