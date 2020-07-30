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

        <h4>Crimes</h4>
    
        <table class="table">
            <?php foreach($crime->pessoas as $row) : ?>
                <tr>
                    <th scope="row"><?= __('Utilizadores') ?></th>
                    <td><?= h($row->nome) ?></td>

                    <td><input type="checkbox" name="formDoor[]" value= <?= $row->id ?> />   </td>             
                </tr> 
            <?php endforeach ?>

        </table>

        <table class="table">            
            <th><?= __('Adicionar outra pessoa: ') ?></th>
            <th>
                <?php
                    echo $this->Form->select('pessoa_crimes', $pessoas, ['empty' => 'Selecionar']);
                ?>
                
            </th>
        </table>
            

    </div>
    <button class="btn btn-success btn-lg" type="submit">Alterar</button>
    <?= $this->Form->end() ?>
    
</div>