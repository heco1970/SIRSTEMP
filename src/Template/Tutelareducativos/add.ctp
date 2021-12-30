<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('Novo Registo Seguro Tutelar Educativo') ?></h6>
    </div>
    <?= $this->Form->create($tutelareducativo) ?>
    <div class='ml-4 mt-4 mr-4'>
        <div id='my-form-body'>
            <div class="form-row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="id_pedido">Id Pedido</label>
                        <?php echo $this->Form->control('id_pedido', ['id' => 'campoIdPedido', 'label' => false, 'type' => 'select', 'multiple' => false, 'options' => $pedidos, 'class' => 'form-control']); ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="id_equipa">Equipa</label>
                        <?php echo $this->Form->control('id_equipa', ['id' => 'campoIdEquipa', 'label' => false, 'type' => 'select', 'multiple' => false, 'options' => $teams, 'class' => 'form-control']); ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-10">
                    <div class="form-group">
                        <label for="nome_prestador_trabalho">Nome do Jovem</label>
                        <?php echo $this->Form->control('nome_jovem', ['id' => 'campoNomeJovem', 'label' => false, 'class' => 'form-control', 'required']); ?>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-sm-5">
                    <div class="form-group">
                        <label for="data_fim_execucao">Data de Nascimento</label>
                        <?php echo $this->Form->text('data_nascimento', ['id' => 'campoDataNascimento', 'label' => false, 'class' => 'form-control', 'type' => 'date']); ?>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-sm-5">
                    <div class="form-group">
                        <label for="hora_aplicadas">NIF</label>
                        <?php echo $this->Form->control('nif', ['id' => 'campoNif', 'label' => false, 'class' => 'form-control', 'required', 'min' => 0]); ?>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-sm-10">
                    <div class="form-group">
                        <label for="designacao_entidade">Designação da Entidade Beneficiária da Tarefa</label>
                        <?php echo $this->Form->control('designacao_entidade', ['id' => 'campoEntidadeBeneficiaria', 'label' => false, 'class' => 'form-control', 'required']); ?>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-sm-5">
                    <div class="form-group">
                        <label for="data">Data de Início</label>
                        <?php echo $this->Form->text('data_inicio', ['id' => 'campoInicio', 'label' => false, 'class' => 'form-control', 'type' => 'date']); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer card-footer-fixed">
        <?= $this->Form->button(__('Gravar'), ['class' => "btn btn-success float-right"]) ?>
        <a href="/tutelareducativos/index" class="btn btn-secondary float-right space-right"><?= __('Voltar') ?></a>
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

    $('#campoIdPedido').select2({
        theme: "bootstrap4",
        ajax: {
            url: '/tutelareducativos/idPedidoAutoComplete',
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
</script>



















<!-- <?php
        /**
         * @var \App\View\AppView $this
         * @var \App\Model\Entity\Tutelareducativo $tutelareducativo
         */
        ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Tutelareducativos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="tutelareducativos form large-9 medium-8 columns content">
    <?= $this->Form->create($tutelareducativo) ?>
    <fieldset>
        <legend><?= __('Add Tutelareducativo') ?></legend>
        <?php
        echo $this->Form->control('id_pedido');
        echo $this->Form->control('id_equipa');
        echo $this->Form->control('nome_jovem');
        echo $this->Form->control('nif');
        echo $this->Form->control('data_nascimento');
        echo $this->Form->control('designacao_entidade');
        echo $this->Form->control('data_inicio');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div> -->