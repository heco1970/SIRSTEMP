<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('Alterar Registo de Pedido') ?></h6>
    </div>
    <?= $this->Form->create($pedido) ?>
    <div class='ml-4 mt-4 mr-4'>
        <div id='my-form-body'>
            <div class="form-row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="pedido_id">ID Pedido</label>
                        <?= $this->Form->text('id', ['id' => 'id', 'label' => false, 'disabled' => true, 'class' => 'form-control', 'value' => h($pedido->processo->id), 'required']); ?>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="processo_id">Processo</label>
                        <?= $this->Form->text('processo_id', ['id' => 'processo_id', 'label' => false, 'class' => 'form-control', 'value' => h($pedido->processo->processo_id), 'required']); ?>
                        <?php
                            if (!empty($errors1)) {
                                echo "<div class='error-message' style='color:red; font-weight: bold;'> Processo que tinha selecionado não existe.</div>";
                            } 
                        ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="nome_pessoa">Nome Pessoa</label>
                        <?= $this->Form->text('pessoa_id', ['id' => 'pessoa_id', 'class' => 'form-control', 'label' => false, 'value' => h($pedido->pessoa->nome), 'required']); ?>
                        <?php                               
                            if (!empty($errors)) {
                                echo "<div class='error-message' style='color:red; font-weight: bold;'> Pessoa que tinha selecionado não existe.</div>";
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="equipa_responsavel">Equipa Responsável</label>
                        <?php echo $this->Form->control('team_id', ['id' => 'team_id', 'class' => 'form-control','empty' => 'Escolha uma equipa...','default'=>[''],'disabled'=>[''],'label' => false, 'options' => $teams]); ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="tipo_pedido">Tipo de Pedido de código</label>
                        <?php echo $this->Form->control('pedidostypes_id', ['label' => false, 'class' => 'form-control', 'options' => $pedidostypes]); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer card-footer-fixed">
        <?= $this->Form->button(__('Gravar'), ['class' => 'btn btn-success float-right']) ?>
        <?php if(!isset($_GET['pessoa'])){?>
        <a href="/pedidos/index" class="btn btn-secondary float-right space-right"><?= __('Voltar') ?></a>
        <?php }else{?>
        <a href="/pessoas/view/<?= $_GET['pessoa'] ?>" class="btn btn-secondary float-right space-right"><?= __('Voltar') ?></a>
        <?php }?>
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
        $('#team_id').click(function() {
            var searchkey = $('#team_id').val();
            searchTags(searchkey);
        });

        $('#team_id').trigger("click");

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
    
    $('#pais_id').change(function() {
        if($('#pais_id').val() != 193){
            $('#concelho_id').hide("slow");
        }
        else{
            $('#concelho_id').show("slow"); 
        }
    });
    $('#pais_id').trigger("change");

</script>
<?php $this->end(); ?>