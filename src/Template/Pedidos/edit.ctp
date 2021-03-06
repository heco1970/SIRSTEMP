<style>
    .hide{
        display: none;
    }
</style>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('Alterar Registo de Pedido') ?></h6>
    </div>
    <?= $this->Form->create($pedido) ?>
    <div class='ml-4 mt-4 mr-4'>
        <div id='my-form-body'>
            <div class="row ">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="nome_pessoa">Nome da pessoa</label>
                        <?php echo $this->Form->control('pessoa_id', ['id' => 'pessoa_id', 'class' => 'form-control', 'empty' => ' ',  'label' => false, 'options' => $pessoas, 'required']); ?>
                    </div>
                </div>
            </div>
            <div class="form-row" style="margin-left: 1px; margin-bottom: 10px;">
                <label for="id_pedido" style="margin-right: 30px; padding-top: 8px;">ID da Pedido</label>
                <?php echo $this->Form->control('id', ['type' => 'text', 'label' => false, 'disabled' => true, 'class' => 'form-control', 'style' => 'width: 65%;']); ?>

                <label for="processo" style="margin-right: 30px; padding-top: 8px;">N.Processo</label>
                <div id="input select" style="width: 40%;">
                    <?php //echo $this->Form->control('processo_id', ['id' => 'processo_id','label' => false, 'class' => 'form-control', 'options' => $processos, 'value' => h($pedido->processo->processo_id), 'required']); 
                    ?>
                    <?= $this->Form->control('processo_id', ['id' => 'processo_id', 'class' => 'form-control',  'label' => false, 'options' => $processos, 'value' => h($pedido->processo->processo_id), 'required']); ?>
                    <?php
                    if (!empty($errors1)) {
                        echo "<div class='error-message' style='color:red; font-weight: bold;'> Processo que tinha selecionado não existe.</div>";
                    }
                    ?>
                </div>
            </div>
            <div class="row ">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="referencia">Referências</label>
                        <?php echo $this->Form->control('referencia', ['label' => false, 'class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="datarecepcao">Data de recepção</label>
                        <?php echo $this->Form->text('datarecepcao', ['label' => false, 'value' => h($pedido->datarecepcao->i18nFormat('yyyy-MM-dd')), 'class' => 'form-control', 'type' => 'date']); ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="canalentrada">Canal de entrada</label>
                        <?php echo $this->Form->control('canalentrada', ['label' => false, 'class' => 'form-control']); ?>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="pedidostype_id">Tipo de Pedidos</label>
                        <?php echo $this->Form->control('pedidostype_id', ['label' => false, 'class' => 'form-control', 'options' => $pedidostypes]); ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="designacao">Designação</label>
                        <?php
                            $listaDesignacao = array('1' => 'teste', '2' => 'outros');
                            echo $this->Form->control('designacao', ['id' => 'designacao', 'class' => 'form-control', 'empty' => ' ', 'options' => $listaDesignacao, 'label' => false, 'required']); 
                        ?>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <?= $this->Form->control('descricao', ['id' => 'descricao', 'class' => 'form-control', 'label' => false, 'required']); ?>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="team_id">Equipa / Centro Educativo</label>
                        <?php echo $this->Form->control('team_id', ['id' => 'team_id', 'class' => 'form-control', 'empty' => 'Escolha uma equipa...', 'default' => [''], 'disabled' => [''], 'label' => false, 'options' => $teams]); ?>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="state_id">Estado</label>
                        <?php echo $this->Form->control('state_id', ['class' => 'form-control', 'options' => $states, 'value' => h($pedido->state->id), 'label' => false]); ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="termino">Data Encerramento</label>
                        <?php echo $this->Form->text('termino', ['label' => false, 'value' => h($pedido->termino->i18nFormat('yyyy-MM-dd')), 'class' => 'form-control', 'type' => 'date']); ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="numeropedido">Condição de Encerramento</label>
                        <?php echo $this->Form->control('numeropedido', ['class' => 'form-control',  'label' => false, 'type' => 'number']); ?>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="datacriacao">Data da criação</label>
                        <?php echo $this->Form->text('datacriacao', ['label' => false, 'value' => h($pedido->datacriacao->i18nFormat('yyyy-MM-dd')), 'class' => 'form-control', 'type' => 'date']); ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="dataatribuicao">Data da atribuição</label>
                        <?php echo $this->Form->text('dataatribuicao', ['label' => false, 'value' => h($pedido->dataatribuicao->i18nFormat('yyyy-MM-dd')), 'class' => 'form-control', 'type' => 'date']); ?>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="datainicioefectivo">Data de Inicio Efetivo</label>
                        <?php echo $this->Form->text('datainicioefectivo', ['label' => false, 'value' => h($pedido->datainicioefectivo->i18nFormat('yyyy-MM-dd')), 'class' => 'form-control', 'type' => 'date']); ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="datatermoprevisto">Data de termo previsto</label>
                        <?php echo $this->Form->text('datatermoprevisto', ['label' => false, 'value' => h($pedido->datainicioefectivo->i18nFormat('yyyy-MM-dd')), 'class' => 'form-control', 'type' => 'date']); ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="dataefectivatermo">Data de Efetivo Termo</label>
                        <?php echo $this->Form->text('dataefectivatermo', ['label' => false, 'value' => h($pedido->dataefectivatermo->i18nFormat('yyyy-MM-dd')), 'class' => 'form-control', 'type' => 'date']); ?>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="pedidosmotive_id">Motivos dos pedidos</label>
                        <?php echo $this->Form->control('pedidosmotive_id', ['class' => 'form-control', 'options' => $pedidosmotives, 'label' => false]); ?>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="pais_id">País</label>
                        <?php echo $this->Form->text('pais_id', ['id' => 'pais_id', 'label' => false, 'type' => 'select', 'multiple' => false, 'options' => $pais, 'class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="col-sm-3" id="id_con">
                    <div class="form-group">
                        <label for="concelho_id">Concelho</label>
                        <?php echo $this->Form->text('concelho_id', ['id' => 'concelho', 'empty' => ' ', 'label' => false, 'type' => 'select', 'multiple' => false, 'options' => $concelhos, 'class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="col-sm-3" id="id_freg">
                    <div class="form-group">
                        <label for="codigos_postai_id">Freguesia</label>
                        <?php echo $this->Form->control('codigos_postai_id', ['id' => 'freguesia', 'empty' => ' ', 'label' => false, 'type' => 'select', 'multiple' => false, 'class' => 'form-control', 'required']); ?>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="gestor">TRS Responsável / Gestor</label>
                        <?php echo $this->Form->control('gestor', ['class' => 'form-control', 'label' => false, 'disabled' => true, 'type' => 'select']); ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="periocidaderelatorios">Periocidade de Relatorios</label>
                        <?php echo $this->Form->control('periocidaderelatorios', ['class' => 'form-control',  'label' => false, 'type' => 'text']); ?>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="fatura">Fatura</label>
                        <?= $this->Form->control('fatura', ['class' => 'form-control', 'label' => false]); ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="centroeducativo">Centro Educativo</label>
                        <?= $this->Form->control('centroeducativo', ['class' => 'form-control', 'label' => false]); ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="establecimentopricional">Estabelecimento Prisional</label>
                        <?= $this->Form->control('establecimentopricional', ['class' => 'form-control', 'label' => false]); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer card-footer-fixed">
        <?= $this->Form->button(__('Gravar'), ['class' => 'btn btn-success float-right']) ?>
        <?php if (!isset($_GET['pessoa'])) { ?>
            <a href="/pedidos/index" class="btn btn-secondary float-right space-right"><?= __('Voltar') ?></a>
        <?php } else { ?>
            <a href="/pessoas/view/<?= $_GET['pessoa'] ?>" class="btn btn-secondary float-right space-right"><?= __('Voltar') ?></a>
        <?php } ?>
    </div>
    <?= $this->Form->end() ?>
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css" integrity="sha512-CbQfNVBSMAYmnzP3IC+mZZmYMP2HUnVkV4+PwuhpiMUmITtSpS7Prr3fNncV1RBOnWxzz4pYQ5EAGG4ck46Oig==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    var selData = 0;

    $.fn.select2.defaults.set("theme", "bootstrap");

    $(function() {
        $("#pessoa_id").autocomplete({
            minLength: 1,
            source: function(request, response) {
                $.ajax({
                    url: "<?php echo $this->Url->build(['controller' => 'Pedidos', 'action' => 'Search']); ?>" +
                        '?term=' +
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
                    url: "<?php echo $this->Url->build(['controller' => 'Pedidos', 'action' => 'SearchPedido']); ?>" +
                        '?term=' +
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

        $('#freguesia').select2({
            ajax: {
                url: function(params) {
                    return '/Pedidos/freguesiasByConselhos/' + selData;
                },
                dataType: 'json',
                delay: 250,
            }
        });

        $("#concelho").change(function(event) {
            var data = $(this).val();
            selData = data;
        })

        $('#designacao').change(function() {
            if ($('#designacao').val() == 2) {
                $('#descricao').removeAttr('disabled');
            } else {
                $('#descricao').attr('disabled', true);
                $('#descricao').attr("required", true);
                $('#descricao').val("");
            }
        });

        $('#pais_id').change(function() {
            hideShow();
        });

        $('#pais_id').ready(function() {
            hideShow();
        });

        $('#team_id').click(function() {
            var searchkey = $('#team_id').val();
            searchTags(searchkey);
        });

        $('#team_id').trigger("click");

        function hideShow(){
            if ($('#pais_id').val() == 193) {
                $('#concelho').removeAttr('disabled');
                $('#freguesia').removeAttr('disabled');
                $('#id_con').removeClass('hide');
                $('#id_freg').removeClass('hide');
            } else {
                $('#concelho').attr('disabled', true);
                $('#concelho').val("");

                $('#freguesia').attr('disabled', true);
                $('#freguesia').val("");

                $('#id_con').addClass('hide');
                $('#id_freg').addClass('hide');
            }
        }

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