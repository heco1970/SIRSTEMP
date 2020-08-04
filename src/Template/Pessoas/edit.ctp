





<link href="/css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="/js/multiselect.js"></script>
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('Editar Registo de Equipa') ?></h6>
    </div>
    <?= $this->Form->create($pessoa, ['id' => 'myForm']) ?>
  
<div class='ml-4 mr-4 mt-4'>
        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <label for="nome">
                        <h4><?= __('Nome') ?></h4>
                    </label>
                    <?= $this->Form->control('nome', ['class' => 'form-control', 'nome' => 'nome', 'label' => false, 'required']); ?>
                </div>
                <div class="form-group">
                    <label for="data">
                        <h4><?= __('Data Nascimento') ?></h4>
                    </label>
                    <?php //echo $this->Form->text('data_nascimento', ['label' => false, 'class' => 'form-control', 'type' => 'date']); ?>

                    <?= $this->Form->control('data_nascimento', ['class' => 'form-control', 'data_nascimento' => 'data_nascimento', 'label' => false, 'type' => 'date' ,'required']); ?>
                </div>
                <div class="form-group">
                    <label for="nomepai">
                        <h4><?= __('Nome do pai') ?></h4>
                    </label>
                    <?= $this->Form->control('nomepai', ['class' => 'form-control', 'nomepai' => 'nomepai', 'label' => false, 'required']); ?>
                </div>
                <div class="form-group">
                    <label for="nomemae">
                        <h4><?= __('Nome da mãe') ?></h4>
                    </label>
                    <?= $this->Form->control('nomemae', ['class' => 'form-control', 'nomemae' => 'nomemae', 'label' => false, 'required']); ?>
                </div>
                <div class="form-group">
                    <label for="estadocivil">
                        <h4><?= __('Estado Civil') ?></h4>
                    </label>
                    <?= $this->Form->control('id_estadocivil', ['class' => 'form-control', 'id_estadocivil' => 'id_estadocivil', 'label' => false, 'required']); ?>
                </div>
                <div class="form-group">
                    <label for="genero">
                        <h4><?= __('Genero') ?></h4>
                    </label>
                    <?= $this->Form->control('id_genero', ['class' => 'form-control', 'id_genero' => 'id_genero', 'label' => false, 'required']); ?>
                </div>
                <div class="form-group">
                    <label for="pais">
                        <h4><?= __('País') ?></h4>
                    </label>
                    <?= $this->Form->control('pais_id', ['class' => 'form-control', 'pais_id' => 'pais_id', 'label' => false, 'required']); ?>
                </div>
               
                <div class="form-group">
                    <label for="cc">
                        <h4><?= __('cc') ?></h4>
                    </label>
                    <?= $this->Form->control('cc', ['class' => 'form-control', 'cc' => 'cc', 'label' => false, 'required']); ?>
                </div>

                <div class="form-group">
                    <label for="nif">
                        <h4><?= __('NIF') ?></h4>
                    </label>
                    <?= $this->Form->control('nif', ['class' => 'form-control', 'nif' => 'nif', 'label' => false, 'required']); ?>
                </div>
               
                <div class="form-group">
                    <label for="outroidentifica">
                        <h4><?= __('outroidentifica') ?></h4>
                    </label>
                    <?= $this->Form->control('outroidentifica', ['class' => 'form-control', 'outroidentifica' => 'outroidentifica', 'label' => false, 'required']); ?>
                </div>
                <div class="form-group">
                    <label for="unidadeopera">
                        <h4><?= __('unidadeopera') ?></h4>
                    </label>
                    <?= $this->Form->control('id_unidadeopera', ['class' => 'form-control', 'id_unidadeopera' => 'cid_unidadeoperac', 'label' => false, 'required']); ?>
                </div>
                <div class="form-group">
                    <label for="estado">
                        <h4><?= __('Estado') ?></h4>
                    </label>
                    <?= $this->Form->control('estado', ['class' => 'form-control', 'estado' => 'estado', 'label' => false, 'required']); ?>
                </div>
                <div class="form-group">
                    <label for="observacoes">
                        <h4><?= __('Observações') ?></h4>
                    </label>
                    <?= $this->Form->control('observacoes', ['class' => 'form-control', 'observacoes' => 'observacoes', 'label' => false, 'required']); ?>
                </div>
            </div>
        </div>
    

    <div class="pessoas form large-9 medium-8 columns content">
        <div class="form-row">
                <div class="col-5">
                    <div class="form-group">
                        <label for="multiselect">
                            <h4><?= __(' por seleccionar: ') ?></h4>
                        </label>
                    
                    <?= $this->Form->control('multiselect',array('label'=>false,'size'=>8,'class'=>"form-control",'type' => 'select', 'multiple' => true, 'options' => $crimes));?>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group mt-5">
                        <button type="button" id="multiselect_rightAll" class="btn btn-block btn-warning">Adicionar Todos</button>
                        <button type="button" id="multiselect_rightSelected" class="btn btn-block btn-primary">Adicionar<i class="glyphicon glyphicon-chevron-right"></i></button>
                        <button type="button" id="multiselect_leftSelected" class="btn btn-block btn-primary">Remover<i class="glyphicon glyphicon-chevron-left"></i></button>
                        <button type="button" id="multiselect_leftAll" class="btn btn-block btn-warning">Remover Todos<i class="glyphicon glyphicon-backward"></i></button>
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-group">
                        <label for="multiselect_to">
                            <h4><?= __(' seleccionados: ') ?></h4>
                        </label>
                        
                        <?= $this->Form->control('crime_id',array('id'=>"multiselect_to",'label'=>false,'size'=>8,'class'=>"form-control",'type' => 'select', 'multiple' => true, 'options' => $crimes1));?>
                
                    </div>
                </div>

            </div>
        </div>
        <div class="card-footer card-footer-fixed">
            <?= $this->Form->button(__('Alterar'), ['class' => 'btn btn-success float-right']) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>
<script>
    $('#multiselect').multiselect();
</script>

