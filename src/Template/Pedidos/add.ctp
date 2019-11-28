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
            <div class="col-sm-12">
                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="name"><h4><?=__('Processo')?></h4></label>
                        <?= $this->Form->control('processo_id', ['class' => 'form-control', 'options' => $processos, 'label' => false]);?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="name"><h4><?=__('Pessoa')?></h4></label>
                        <?= $this->Form->control('pessoa_id', ['class' => 'form-control', 'options' => $pessoas, 'label' => false]);?>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="name"><h4><?=__('Data de recepção')?></h4></label>
                        <?= $this->Form->control('datarecepcao', ['class' => 'form-control', 'label' => false, 'type' => 'text']);?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
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
            <div class="col-sm-4">
                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="name"><h4><?=__('Descricão')?></h4></label>
                        <?= $this->Form->control('descricao', ['class' => 'form-control',  'label' => false]);?>
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
                        <label for="name"><h4><?=__('Descrição')?></h4></label>
                        <?= $this->Form->control('descricao', ['class' => 'form-control',  'label' => false]);?>
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
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="name"><h4><?=__('Estado')?></h4></label>
                        <?= $this->Form->control('state_id', ['class' => 'form-control', 'options' => $states, 'label' => false]);?>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="name"><h4><?=__('Termino')?></h4></label>
                        <?= $this->Form->control('termino', ['class' => 'form-control',  'label' => false, 'type' => 'text']);?>
                    </div>
                </div>
            </div>

        </div>
    </fieldset>
    <?= $this->Form->button(__('Gravar'), ['class' => 'btn btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
<?=$this->Html->script('/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js', ['block' => true]);?>
<?=$this->Html->css('/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css', ['block' => true]);?>


<?php $this->start('scriptBottom') ?>
    <script>
        $(document).ready(function() {
            $('.datepicker').datepicker();
        });
    </script>
<?php $this->end(); ?>
