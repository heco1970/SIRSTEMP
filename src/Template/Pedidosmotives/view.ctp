<?=$this->Html->css('/vendor/dynatables/jquery.dynatable.min.css', ['block' => true]);?>
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

        <h3><?=  h($pedidosmotive->descricao) ?></h3>

        <table class="table">
            <tr>
                <th scope="row"><?= __('Descricao') ?></th>
                <td><?=  h($pedidosmotive->descricao) ?></td>
            </tr>
        </table>
    </div>

</div>

