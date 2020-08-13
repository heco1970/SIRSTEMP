<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

    <?= $this->Form->create($pedidostype) ?>
    <legend><?= __('Adicionar um Tipo de Pedido') ?></legend>

        <table class="table">
            <tr>
                <th scope="row"><?= __('Descrição') ?></th>
                <td>
                    <?php
                       echo $this->Form->text('descricao', ['required' => true]);
                    ?>
                </td>
            </tr>
        </table>

    </div>
    <button class="btn btn-success btn-lg" type="submit">Adicionar</button>
    <?= $this->Form->end() ?>
    
</div>