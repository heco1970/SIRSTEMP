<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('Novo Registo de PTFC') ?></h6>
    </div>
    <?= $this->Form->create($formulario) ?>
    <div class='ml-4 mt-4 mr-4'>
        <div id='my-form-body'>
            <div class="form-row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="id_pedido">Id Pedido</label>
                        <?php echo $this->Form->control('id_pedido', ['label' => false, 'type' => 'select', 'multiple' => false, 'options' => $pedidos, 'class' => 'form-control']); ?>
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
                        <label for="id_equipa">Equipa/CE</label>
                        <?php echo $this->Form->control('id_equipa', ['label' => false, 'type' => 'select', 'multiple' => false, 'options' => $teams, 'class' => 'form-control']); ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-10">
                    <div class="form-group">
                        <label for="nome_prestador_trabalho">Nome do Prestador de Trabalho/Tarefa</label>
                        <?php echo $this->Form->control('nome_prestador_trabalho', ['label' => false, 'class' => 'form-control', 'required']); ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-10">
                    <div class="form-group">
                        <label for="designacao_entidade">Designação da Entidade Beneficiária de Trabalho/Tarefa</label>
                        <?php echo $this->Form->control('designacao_entidade', ['label' => false, 'class' => 'form-control', 'required']); ?>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="hora_aplicadas">Número de horas aplicadas</label>
                        <?php echo $this->Form->control('hora_aplicadas', ['id' => 'horasAplicadas', 'label' => false, 'class' => 'form-control', 'required', 'min' => 0]); ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="hora_prestadas">Número de horas efectivamente prestadas</label>
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
                        <label for="data_fim_execucao">Data do fim execução pena/media(d/m/a)</label>
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
                        <label for="tecnico">O/A Técnico(a)</label>
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

<script>
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