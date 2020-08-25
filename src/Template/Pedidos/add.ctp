<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pedido $pedido
 */
?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('Novo Registo de Pedido') ?></h6>
    </div>

    <?= $this->Form->create($pedido) ?>
    <fieldset>
        <div class='ml-4 mt-4 mr-4'>
            <div id='my-form-body'>
                <div class="row ">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <label for="processo_id">
                                    <h4><?= __('Processo') ?></h4>
                                </label>
                                <?= $this->Form->text('processo', ['id' => 'processo_id', 'class' => 'form-control',  'label' => false, 'required']); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group ui-widget">
                            <div class="col-xs-12">
                                <label for="pessoa_id">
                                    <h4><?= __('Nome da Pessoa') ?></h4>
                                </label>
                                <?= $this->Form->text('pessoa', ['id' => 'pessoa_id', 'class' => 'form-control',  'label' => false, 'required']); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class='ml-4 mt-4 mr-4'>
            <div id='my-form-body'>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <label for="name">
                                    <h4><?= __('Data de recepção') ?></h4>
                                </label>
                                <?php echo $this->Form->text('datarecepcao', ['label' => false, 'class' => 'form-control', 'type' => 'date']); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <label for="name">
                                    <h4><?= __('Referência') ?></h4>
                                </label>
                                <?= $this->Form->control('referencia', ['class' => 'form-control',  'label' => false]); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <label for="name">
                                    <h4><?= __('Canal de Entrada') ?></h4>
                                </label>
                                <?= $this->Form->control('canalentrada', ['class' => 'form-control',  'label' => false]); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <label for="name">
                                    <h4><?= __('Origem') ?></h4>
                                </label>
                                <?= $this->Form->control('origem', ['class' => 'form-control',  'label' => false]); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <label for="name">
                                    <h4><?= __('Tipos de Pedidos') ?></h4>
                                </label>
                                <?= $this->Form->control('pedidostypes_id', ['class' => 'form-control', 'options' => $pedidostypes, 'label' => false]); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <label for="team_id">
                                    <h4><?= __('Equipa Responsável') ?></h4>
                                </label>
                                <?= $this->Form->control('team_id', [
                                    'id' => 'team_id', 'class' => 'form-control','empty' => 'Escolha uma equipa...',  'label' => false, 'options' => $teams]); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class='ml-4 mt-4 mr-4'>
            <div id='my-form-body'>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <label for="name">
                                    <h4><?= __('Estado') ?></h4>
                                </label>
                                <?= $this->Form->control('state_id', ['class' => 'form-control', 'options' => $states, 'label' => false]); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <label for="name">
                                    <h4><?= __('Termino') ?></h4>
                                </label>
                                <?php echo $this->Form->text('termino', ['label' => false, 'class' => 'form-control', 'type' => 'date']); ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <label for="name">
                                    <h4><?= __('Número do pedido') ?></h4>
                                </label>
                                <?= $this->Form->control('numeropedido', ['class' => 'form-control',  'label' => false, 'type' => 'number']); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <label for="name">
                                    <h4><?= __('Data de criação') ?></h4>
                                </label>
                                <?php echo $this->Form->text('datacriacao', ['label' => false, 'class' => 'form-control', 'type' => 'date']); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <label for="name">
                                    <h4><?= __('Data de atribuição') ?></h4>
                                </label>
                                <?php echo $this->Form->text('dataatribuicao', ['label' => false, 'class' => 'form-control', 'type' => 'date']); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <label for="name">
                                    <h4><?= __('Data de Inicio Efetivo') ?></h4>
                                </label>
                                <?php echo $this->Form->text('datainicioefectivo', ['label' => false, 'class' => 'form-control', 'type' => 'date']); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <label for="name">
                                    <h4><?= __('Data de termo previsto') ?></h4>
                                </label>
                                <?php echo $this->Form->text('datatermoprevisto', ['label' => false, 'class' => 'form-control', 'type' => 'date']); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <label for="name">
                                    <h4><?= __('Data de efetivo termo') ?></h4>
                                </label>
                                <?php echo $this->Form->text('dataefectivatermo', ['label' => false, 'class' => 'form-control', 'type' => 'date']); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <label for="name">
                                    <h4><?= __('Motivos dos pedidos') ?></h4>
                                </label>
                                <?= $this->Form->control('pedidosmotives_id', ['class' => 'form-control', 'options' => $pedidosmotives, 'label' => false]); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <label for="name">
                                    <h4><?= __('País') ?></h4>
                                </label>
                                <?php echo $this->Form->control('pais_id', ['label' => false, 'type' => 'select', 'multiple' => false, 'default' => 193, 'options' => $pais, 'class' => 'form-control']); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <label for="name">
                                    <h4><?= __('Concelho') ?></h4>
                                </label>
                                <?= $this->Form->control('concelho', ['class' => 'form-control',  'label' => false, 'type' => 'text']); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <label for="name">
                                    <h4><?= __('Transferencias') ?></h4>
                                </label>
                                <?= $this->Form->control('transferencias', ['class' => 'form-control',  'label' => false, 'type' => 'text']); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6" id="gestor">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <label for="name">
                                    <h4><?= __('Gestor') ?></h4>
                                </label>
                                <?= $this->Form->control('gestor', ['class' => 'form-control',  'label' => false, 'type' => 'select', 'disabled']); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <label for="name">
                                    <h4><?= __('Seguro') ?></h4>
                                </label>
                                <?= $this->Form->control('seguro', ['class' => 'form-control',  'label' => false, 'type' => 'text']); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <label for="name">
                                    <h4><?= __('Periocidade de Relatorios') ?></h4>
                                </label>
                                <?= $this->Form->control('periocidaderelatorios', ['class' => 'form-control',  'label' => false, 'type' => 'text']); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </fieldset>
    <div class="card-footer card-footer-fixed">
        <?= $this->Form->button(__('Gravar'), ['class' => 'btn btn-success float-right']) ?>
        <a href="/perfis/index" class="btn btn-secondary float-right space-right"><?= __('Voltar') ?></a>
    </div> <?= $this->Form->end() ?>
</div>
<?= $this->Html->css('/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css', ['block' => true]); ?>
<?= $this->Html->css('/vendor/select2/select2.min', ['block' => true]); ?>
<?= $this->Html->css('/vendor/select2/select2-bootstrap4.min', ['block' => true]); ?>
<?= $this->Html->script('/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js', ['block' => true]); ?>
<?= $this->Html->script('/vendor/select2/select2.min', ['block' => true]); ?>
<link href="/css/jquery-ui.min.css" rel="stylesheet">
<link href="/css/jquery-ui.structure.min.css" rel="stylesheet">
<link href="/css/jquery-ui.theme.min.css" rel="stylesheet">
<script src="/js/jquery.js"></script>
<script src="/js/jquery-ui.min.js"></script>


<?php $this->start('scriptBottom') ?>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<script>
    $(function() {
        $("#pessoa_id").autocomplete({
            minLength: 1,
            source: function(request, response) {
                $.ajax({
                    url: "<?php echo $this->Url->build(['controller' => 'Pedidos', 'action' => 'Search']); ?>" + '?term=' +
                        request.term,
                    dataType: "json",
                    success: function(data) {
                        response(data);
                        console.log(data);
                    }
                });
            }
        });
    });
    $(function() {
        $("#processo_id").autocomplete({
            minLength: 1,
            source: function(request, response) {
                $.ajax({
                    url: "<?php echo $this->Url->build(['controller' => 'Pedidos', 'action' => 'SearchPedido']); ?>" + '?term=' +
                        request.term,
                    dataType: "json",
                    success: function(data) {
                        response(data);
                        console.log(data);
                    }
                });
            }
        });
    });
    $('document').ready(function() {
        $('#team_id').change(function() {

            var searchkey = $('#team_id').val();

            searchTags(searchkey);
        });


        function searchTags(keyword) {
            var data = keyword;

            $.ajax({
                method: 'get',
                url: "<?php echo $this->Url->build(['controller' => 'Pedidos', 'action' => 'Gestor']); ?>",
                data: {
                    keyword: data,

                },

                success: function(response) {
                    $('#gestor').html(response);
                }
            });
        };
    });
</script>
<?php $this->end(); ?>