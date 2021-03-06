<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('Novo Registo Seguro Penal') ?></h6>
    </div>
    <?= $this->Form->create($formulario) ?>
    <div class='ml-4 mt-4 mr-4'>
        <div id='my-form-body'>
            <div class="form-row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="id_pedido">Id Pedido</label>
                        <?php echo $this->Form->control('id_pedido', ['id' => 'id_pedido', 'label' => false, 'type' => 'select', 'multiple' => false, 'options' => $pedidos, 'class' => 'form-control']); ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="dr_ds">DR/DS</label>
                        <?php echo $this->Form->control('dr_ds', ['label' => false, 'class' => 'form-control', 'required']); ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="id_equipa">Equipa</label>
                        <?php echo $this->Form->control('id_equipa', ['label' => false, 'type' => 'select', 'multiple' => false, 'options' => $teams, 'class' => 'form-control']); ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-10">
                    <div class="form-group">
                        <label for="nome_prestador_trabalho">Nome do Prestador de Trabalho</label>
                        <?php echo $this->Form->control('nome_prestador_trabalho', ['label' => false, 'class' => 'form-control', 'required']); ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-10">
                    <div class="form-group">
                        <label for="designacao_entidade">Designa????o da Entidade Benefici??ria de Trabalho/Tarefa</label>
                        <?php echo $this->Form->control('designacao_entidade', ['label' => false, 'class' => 'form-control', 'required']); ?>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="hora_aplicadas">N??mero de horas aplicadas</label>
                        <?php echo $this->Form->control('hora_aplicadas', ['id' => 'horasAplicadas', 'label' => false, 'class' => 'form-control', 'required', 'min' => 0]); ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="hora_prestadas">N??mero de horas efectivamente prestadas</label>
                        <?php echo $this->Form->control('hora_prestadas', ['id' => 'horasPrestadas', 'label' => false, 'class' => 'form-control', 'required', 'min' => 0]); ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-10">
                    <div class="form-group">
                        <label for="actividade_exercida">Actividade exercida</label>
                        <?php echo $this->Form->control('actividade_exercida', ['label' => false, 'class' => 'form-control', 'required']); ?>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-sm-5">
                    <div class="form-group">
                        <label for="data_fim_execucao">Data do fim execu????o pena/medida(d/m/a)</label>
                        <?php echo $this->Form->text('data_fim_execucao', ['id' => 'dataFim', 'label' => false, 'class' => 'form-control', 'type' => 'date']); ?>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group">
                        <label for="data">Data(d/m/a)</label>
                        <?php echo $this->Form->text('data', ['label' => false, 'class' => 'form-control', 'type' => 'date']); ?>
                    </div>
                </div>
            </div>
            <hr>
            <div class="form-row">
                <div class="col-sm-10">
                    <div class="form-group">
                        <label for="tecnico">O/A T??cnico(a)</label>
                        <?php echo $this->Form->control('tecnico', ['label' => false, 'class' => 'form-control', 'required']); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer card-footer-fixed">
        <?= $this->Form->button(__('Gravar'), ['class' => "btn btn-success float-right"]) ?>
        <a href="/formularios/index" class="btn btn-secondary float-right space-right"><?= __('Voltar') ?></a>
    </div>
    <?= $this->Form->end() ?>
</div>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/i18n/pt.min.js" integrity="sha512-HEvGImfrVPx3/wEaJU4WuHFc1nrdDsSkx+4gRbGIDHXmgvBoJLHBjVMjobvRz1Zox+QO6vqbpqexKAnEZKfhnQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?= $this->Html->css('https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css', ['block' => true]); ?>
<?= $this->Html->css('https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css', ['block' => true]); ?>
<?= $this->Html->script('https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js', ['block' => true]); ?>
<script>
    $.fn.select2.defaults.set("theme", "bootstrap");

    $('#id_pedido').select2({
        theme: "bootstrap4",
        ajax: {
            url: '/formularios/idPedidoAutoComplete',
            dataType: 'json',
            data: function(params) {
                var query = {
                    search: params.term,
                    type: 'public'
                }

                // Query parameters will be ?search=[term]&type=public
                return query;
            },
            processResults: function(data) {
                // Transforms the top-level key of the response object from 'items' to 'results'
                return {
                    results: data.results
                };
            }
        },
        minimumInputLength: 1,
        language: 'pt'
    });

    $('document').ready(function() {

    });

    // Select your input element.
    var number1 = document.getElementById('horasAplicadas');
    var number2 = document.getElementById('horasPrestadas');


    // Listen for input event on numInput.
    number1.onkeyup = function(e) {
        if (this.value < 0) {
            this.value = this.value * (-1);
        }
    }

    number2.onkeyup = function(e) {
        if (this.value < 0) {
            this.value = this.value * (-1);
        }
    }
</script>