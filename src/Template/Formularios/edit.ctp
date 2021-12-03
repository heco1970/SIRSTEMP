<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('Alterar Registo de PTFC') ?></h6>
    </div>
    <?= $this->Form->create($formulario) ?>
    <div class='ml-4 mt-4 mr-4'>
        <div id='my-form-body'>
            <div class="form-row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="nip">Id Verbete</label>
                        <?php echo $this->Form->control('id_pedido', ['label' => false, 'type' => 'select', 'multiple' => false, 'options' => $pedidos, 'class' => 'form-control']); ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="nip">DR/DS</label>
                        <?php echo $this->Form->control('dr_ds', ['label' => false, 'class' => 'form-control', 'required']); ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="processo_id">Equipa/CE</label>
                        <?php echo $this->Form->control('id_equipa', ['label' => false, 'type' => 'select', 'multiple' => false, 'options' => $teams, 'class' => 'form-control']); ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-10">
                    <div class="form-group">
                        <label for="nip">Nome do Prestador de Trabalho/Tarefa</label>
                        <?php echo $this->Form->control('nome_prestador_trabalho', ['label' => false, 'class' => 'form-control', 'required']); ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-10">
                    <div class="form-group">
                        <label for="nip">Designação da Entidade Beneficiária de Trabalho/Tarefa</label>
                        <?php echo $this->Form->control('designacao_entidade', ['label' => false, 'class' => 'form-control', 'required']); ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="nip">Número de horas aplicadas</label>
                        <?php echo $this->Form->control('hora_aplicadas', ['label' => false, 'class' => 'form-control', 'required']); ?>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="nip">Número de horas efectivamente prestadas</label>
                        <?php echo $this->Form->control('hora_prestadas', ['label' => false, 'class' => 'form-control', 'required']); ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-10">
                    <div class="form-group">
                        <label for="nip">Actividade exercida</label>
                        <?php echo $this->Form->control('actividade_exercida', ['label' => false, 'class' => 'form-control', 'required']); ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-5">
                    <div class="form-group">
                        <label for="nip">Data do fim execução pena/media(d/m/a)</label>
                        <?php echo $this->Form->text('data_fim_execucao', ['label' => false, 'value' => h($formulario->data_fim_execucao->i18nFormat('yyyy-MM-dd')), 'class' => 'form-control', 'type' => 'date']); ?>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group">
                        <label for="nip">Data(d/m/a)</label>
                        <?php echo $this->Form->text('data', ['label' => false, 'value' => h($formulario->data->i18nFormat('yyyy-MM-dd')), 'class' => 'form-control', 'type' => 'date']); ?>
                    </div>
                </div>
            </div>
            <hr>
            <div class="form-row">
                <div class="col-sm-10">
                    <div class="form-group">
                        <label for="nip">O/A Técnico(a)</label>
                        <?php echo $this->Form->control('tecnico', ['label' => false, 'class' => 'form-control', 'required']); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer card-footer-fixed">
        <?= $this->Form->button(__('Gravar'), ['class' => 'btn btn-success float-right']) ?>
        <a href="/formularios/index" class="btn btn-secondary float-right space-right"><?= __('Voltar') ?></a>
    </div>
    <?= $this->Form->end() ?>
</div>