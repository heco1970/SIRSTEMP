<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('Alterar Registo de Pedido') ?></h6>
    </div>

    <?= $this->Form->create($pedido) ?>
    <fieldset>
        <div class='ml-4 mt-4 mr-4'>
            <div id='my-form-body'>
                <div class="row ">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="processo_id">Processo</label>
                            <?php echo $this->Form->text('processo_id', ['id' => 'processo_id', 'class' => 'form-control', 'label' => false, 'value' => h($pedido->processo->processo_id), 'required']); ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group ui-widget">
                            <div class="form-group">
                                <label for="pessoa_id">Nome da Pessoa</label>
                                <?php echo $this->Form->text('pessoa_id', ['id' => 'pessoa_id', 'class' => 'form-control', 'label' => false, 'value' => h($pedido->pessoa->nome), 'required']); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="datarecepcao">Data de recepção</label>
                            <?php echo $this->Form->text('datarecepcao', ['label' => false, 'value'=>h($pedido->datarecepcao->i18nFormat('yyyy-MM-dd')),'class' => 'form-control', 'type' => 'date']); ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="referencia">Referência</label>
                            <?php echo $this->Form->control('referencia', ['label' => false, 'class' => 'form-control']); ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="canalentrada">Canal de Entrada</label>
                            <?php echo $this->Form->control('canalentrada', ['label' => false, 'class' => 'form-control']); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="origem">Origem</label>
                            <?php echo $this->Form->control('origem', ['label' => false, 'class' => 'form-control']); ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="pedidostypes_id">Tipos de Pedidos</label>
                            <?php echo $this->Form->control('pedidostypes_id', ['label' => false, 'class' => 'form-control', 'options' => $pedidostypes]); ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="team_id">Equipa Responsável</label>
                            <?php echo $this->Form->control('team_id', ['id' => 'team_id', 'class' => 'form-control','empty' => 'Escolha uma equipa...','default'=>[''],'disabled'=>[''],'label' => false, 'options' => $teams]); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="state_id">Estado</label>
                            <?php echo $this->Form->control('state_id', ['class' => 'form-control', 'options' => $states, 'value' => h($pedido->state->id), 'label' => false]); ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="termino">Termino</label>
                            <?php echo $this->Form->text('termino', ['label' => false, 'value'=>h($pedido->termino->i18nFormat('yyyy-MM-dd')),'class' => 'form-control', 'type' => 'date']); ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="numeropedido">Número do Pedido</label>
                            <?php echo $this->Form->control('numeropedido', ['class' => 'form-control',  'label' => false, 'type' => 'number']); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="datacriacao">Data de Criação</label>
                            <?php echo $this->Form->text('datacriacao', ['label' => false, 'value'=>h($pedido->datacriacao->i18nFormat('yyyy-MM-dd')),'class' => 'form-control', 'type' => 'date']); ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="dataatribuicao">Data de Atribuição</label>
                            <?php echo $this->Form->text('dataatribuicao', ['label' => false, 'value'=>h($pedido->dataatribuicao->i18nFormat('yyyy-MM-dd')),'class' => 'form-control', 'type' => 'date']); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="datainicioefectivo">Data de Inicio Efetivo</label>
                            <?php echo $this->Form->text('datainicioefectivo', ['label' => false, 'value'=>h($pedido->datainicioefectivo->i18nFormat('yyyy-MM-dd')),'class' => 'form-control', 'type' => 'date']); ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="datatermoprevisto">Data de Termo Previsto</label>
                            <?php echo $this->Form->text('datatermoprevisto', ['label' => false, 'value'=>h($pedido->datatermoprevisto->i18nFormat('yyyy-MM-dd')),'class' => 'form-control', 'type' => 'date']); ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="dataefectivatermo">Data de Efetivo Termo</label>
                            <?php echo $this->Form->text('dataefectivatermo', ['label' => false, 'value'=>h($pedido->dataefectivatermo->i18nFormat('yyyy-MM-dd')),'class' => 'form-control', 'type' => 'date']); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="pedidosmotives_id">Motivos dos pedidos</label>
                            <?php echo $this->Form->control('pedidosmotive_id', ['class' => 'form-control', 'options' => $pedidosmotives, 'label' => false]); ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="pais_id">País</label>
                            <?php echo $this->Form->text('pais_id', ['label' => false, 'type' => 'select', 'multiple' => false, 'options' => $pais, 'class' => 'form-control']); ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="concelho">Concelho</label>
                            <?php echo $this->Form->control('concelho', ['class' => 'form-control',  'label' => false, 'type' => 'text']); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="transferencias">Transferências</label>
                            <?php echo $this->Form->control('transferencias', ['class' => 'form-control',  'label' => false, 'type' => 'text']); ?>
                        </div>
                    </div>
                    <div class="col-sm-6" >
                        <div class="form-group" >
                            <label>Gestor</label>
                            
                                <?php echo $this->Form->control('gestor', [ 'class' => 'form-control',  'label' => false, 'type' => 'select', 'disabled']); ?>
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="seguro">Seguro</label>
                            <?php echo $this->Form->control('seguro', ['label' => false, 'class' => 'form-control']); ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="periocidaderelatorios">Periocidade de Relatorios</label>
                            <?php echo $this->Form->control('periocidaderelatorios', ['class' => 'form-control',  'label' => false, 'type' => 'text']); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </fieldset>
    <div class="card-footer card-footer-fixed">
        <?= $this->Form->button(__('Gravar'), ['class' => 'btn btn-success float-right']) ?>
        <a href="/pedidos/index" class="btn btn-secondary float-right space-right"><?= __('Voltar') ?></a>
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
        
        var searchkey = $('#team_id').val();
        searchTags(searchkey);

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
                    $('#gestor').prop("disabled", false);
                }
            });
        };
    });
</script>
<?php $this->end(); ?>