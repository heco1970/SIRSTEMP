<link href="/css/style.css" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="/js/multiselect.js"></script>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('Associar Crime a Pessoa') ?></h6>
    </div>
    <?= $this->Form->create() ?>
    <div class='ml-4 mt-4 mr-4'>
        <div class="form-row">
            <div class="col-6">
                <div class="form-group">
                    <h6 class="text-primary"><?= __('Pessoa') ?></h6>
                    <td><?= h($pessoa->nome) ?></td>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-5">
                <div class="form-group">
                    <label for="multiselect">
                    
                        <h4><?= __('Crimes por seleccionar: ') ?></h4>
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
                        <h4><?= __('Crimes seleccionados: ') ?></h4>
                    </label>
                    <?= $this->Form->control('crime_id',array('id'=>"multiselect_to",'label'=>false,'size'=>8,'class'=>"form-control",'type' => 'select', 'multiple' => true, 'options' => $crimes1));?>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer card-footer-fixed">
        <?= $this->Form->button(__('Gravar'), ['class' => 'btn btn-success float-right']) ?>
        <a href="/crimes/index" class="btn btn-secondary float-right space-right"><?= __('Voltar') ?></a>
    </div>
    <?= $this->Form->end() ?>
</div>
<script>
    $('#multiselect').multiselect();
</script>