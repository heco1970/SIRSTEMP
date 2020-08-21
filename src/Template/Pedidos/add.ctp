<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pedido $pedido
 */
?>

<div class="pedidos form large-9 medium-8 columns content">
    <div class="alert alert-success" role="alert">
        Registo de novo Pedido
    </div>

    <?= $this->Form->create($pedido) ?>
    <fieldset>

        <?php
       //     echo $this->Form->control('processo_id', ['options' => $processos]);
       //     echo $this->Form->control('pessoa_id', ['options' => $pessoas]);
       //     echo $this->Form->control('referencia');
       //     echo $this->Form->control('canalentrada');
       //     echo $this->Form->control('datarecepcao');
        //    echo $this->Form->control('origem');
        //    echo $this->Form->control('descricao');
       //     echo $this->Form->control('equiparesponsavel');
       //     echo $this->Form->control('state_id', ['options' => $states]);
       //     echo $this->Form->control('termino');
        ?>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="name"><h4><?=__('Processo')?></h4></label>
                        <?php echo $this->Form->control('processo_id', ['label' => false, 'class' => 'form-control']); ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="name"><h4><?=__('Nome da Pessoa')?></h4></label>
                        <?php echo $this->Form->control('pessoa_id', ['label' => false, 'class' => 'form-control']); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="name"><h4><?=__('Data de recepção')?></h4></label>
                        <?php echo $this->Form->text('datarecepcao', ['label' => false, 'class' => 'form-control', 'type' => 'date']); ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="name"><h4><?=__('Referência')?></h4></label>
                        <?= $this->Form->control('referencia', ['class' => 'form-control',  'label' => false]);?>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="name"><h4><?=__('Canal de Entrada')?></h4></label>
                        <?= $this->Form->control('canalentrada', ['class' => 'form-control',  'label' => false]);?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="name"><h4><?=__('Origem')?></h4></label>
                        <?= $this->Form->control('origem', ['class' => 'form-control',  'label' => false]);?>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="name"><h4><?=__('Tipos de Pedidos')?></h4></label>
                        <?= $this->Form->control('pedidostypes_id', ['class' => 'form-control', 'options' => $pedidostypes, 'label' => false]);?>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="name"><h4><?=__('Equipa Responsável')?></h4></label>
                        <?= $this->Form->control('equiparesponsavel', ['class' => 'form-control',  'label' => false]);?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="name"><h4><?=__('Estado')?></h4></label>
                        <?= $this->Form->control('state_id', ['class' => 'form-control', 'options' => $states, 'label' => false]);?>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="name"><h4><?=__('Termino')?></h4></label>
                        <?php echo $this->Form->text('termino', ['label' => false, 'class' => 'form-control', 'type' => 'date']); ?>

                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="name"><h4><?=__('Número do pedido')?></h4></label>
                        <?= $this->Form->control('numeropedido', ['class' => 'form-control',  'label' => false, 'type' => 'number']);?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="name"><h4><?=__('Data de criação')?></h4></label>
                        <?php echo $this->Form->text('datacriacao', ['label' => false, 'class' => 'form-control', 'type' => 'date']); ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="name"><h4><?=__('Data de atribuição')?></h4></label>
                        <?php echo $this->Form->text('dataatribuicao', ['label' => false, 'class' => 'form-control', 'type' => 'date']); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="name"><h4><?=__('Data de Inicio Efetivo')?></h4></label>
                        <?php echo $this->Form->text('datainicioefectivo', ['label' => false, 'class' => 'form-control', 'type' => 'date']); ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="name"><h4><?=__('Data de termo previsto')?></h4></label>
                        <?php echo $this->Form->text('datatermoprevisto', ['label' => false, 'class' => 'form-control', 'type' => 'date']); ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="name"><h4><?=__('Data de efetivo termo')?></h4></label>
                        <?php echo $this->Form->text('dataefectivatermo', ['label' => false, 'class' => 'form-control', 'type' => 'date']); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="name"><h4><?=__('Motivos dos pedidos')?></h4></label>
                        <?= $this->Form->control('pedidosmotives_id', ['class' => 'form-control', 'options' => $pedidosmotives, 'label' => false]);?>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="name"><h4><?=__('País')?></h4></label>
                        <?php echo $this->Form->control('pais_id', ['label' => false, 'type' => 'select', 'multiple' => false, 'default' => 193, 'options' => $pais, 'class' => 'form-control']); ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="name"><h4><?=__('Concelho')?></h4></label>
                        <?= $this->Form->control('concelho', ['class' => 'form-control',  'label' => false, 'type' => 'text']);?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="name"><h4><?=__('Transferencias')?></h4></label>
                        <?= $this->Form->control('transferencias', ['class' => 'form-control',  'label' => false, 'type' => 'text']);?>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="name"><h4><?=__('Gestor')?></h4></label>
                        <?= $this->Form->control('gestor', ['class' => 'form-control',  'label' => false, 'type' => 'text']);?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="name"><h4><?=__('Seguro')?></h4></label>
                        <?= $this->Form->control('seguro', ['class' => 'form-control',  'label' => false, 'type' => 'text']);?>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="name"><h4><?=__('Periocidade de Relatorios')?></h4></label>
                        <?= $this->Form->control('periocidaderelatorios', ['class' => 'form-control',  'label' => false, 'type' => 'text']);?>
                    </div>
                </div>
            </div>
        </div>
    </fieldset>
    <div class="card-footer card-footer-fixed">
        <?= $this->Form->button(__('Gravar'), ['class' => 'btn btn-success float-right']) ?>
        <a href="/perfis/index" class="btn btn-secondary float-right space-right"><?= __('Voltar') ?></a>
    </div>    <?= $this->Form->end() ?>
</div>
<?=$this->Html->css('/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css', ['block' => true]);?>
<?=$this->Html->css('/vendor/select2/select2.min', ['block' => true]);?>
<?=$this->Html->css('/vendor/select2/select2-bootstrap4.min', ['block' => true]);?>
<?=$this->Html->script('/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js', ['block' => true]);?>
<?=$this->Html->script('/vendor/select2/select2.min', ['block' => true]);?>


<?php $this->start('scriptBottom') ?>
    <script>
        $(document).ready(function() {
            $('.datepicker').datepicker();
            $('.select2').select2({
                theme: 'bootstrap4',
                ajax: {
                    url: '/pedidos/add',
                    dataType: 'json'
                }
            });
        });
    </script>
<?php $this->end(); ?>
