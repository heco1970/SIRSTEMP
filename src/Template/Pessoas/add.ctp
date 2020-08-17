<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pessoa $pessoa
 */
?>
<style>
    #distritos,#concelhos, #freguesias {
  /* for Firefox */
  -moz-appearance: none;
  /* for Chrome */
  -webkit-appearance: none;
}

</style>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('Novo Registo de Pessoa') ?></h6>
    </div>
    <?= $this->Form->create($pessoa) ?>
    <div class='ml-4 mt-4 mr-4'>
        <div id='my-form-body'>

            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="nome">Nome da Pessoa</label>
                        <?php echo $this->Form->control('nome', ['label' => false, 'class' => 'form-control']); ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="nome_alt">Nome Alternativo</label>
                        <?php echo $this->Form->control('nome_alt', ['label' => false, 'class' => 'form-control']); ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="nomepai">Nome do Pai</label>
                        <?php echo $this->Form->control('nomepai', ['label' => false, 'class' => 'form-control']); ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="nomemaae">Nome da Mâe</label>
                        <?php echo $this->Form->control('nomemae', ['label' => false, 'class' => 'form-control']); ?>

                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="id_estadocivil">Estado Civil</label>
                        <?php echo $this->Form->control('id_estadocivil', ['label' => false, 'type' => 'select', 'multiple' => false, 'options' => $estadocivils, 'class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="id_genero">Genero</label>

                        <?php echo $this->Form->control('id_genero', ['label' => false, 'type' => 'select', 'multiple' => false, 'options' => $generos, 'class' => 'form-control']); ?>

                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="pais_id">Nacionalidade</label>

                        <?php echo $this->Form->control('pais_id', ['label' => false, 'type' => 'select', 'multiple' => false, 'default' => 193, 'options' => $pais, 'class' => 'form-control']); ?>

                    </div>
                </div>
                <div class="col">
                    <div class="form-group">

                        <label for="codigo_postal">Código Postal</label>
                        <div class="form-row">
                            <div class="col-7">
                                <?php echo $this->Form->control('codigo_postal', ['id' => 'codigo_postal', 'type' => 'number', 'max' => 9999, 'min'=>1,'label' => false, 'class' => 'form-control', 'required']); ?>
                            </div>
                            <div class="col-5">
                                <?php echo $this->Form->control('codigo_postal1', ['id' => 'codigo_postal1', 'type' => 'number', 'max' => 999, 'min'=>1,'label' => false, 'class' => 'form-control', 'required']); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row" id="distrito">
                <div class="col">
                    <div class="form-group">
                        <label for="distrito">Distrito</label>

                        <select class='form-control' id="distritos" disabled></select>

                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="concelho">Concelho</label>

                        <select class='form-control' id="concelhos" disabled></select>

                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="freguesia">Freguesia</label>

                        <select class='form-control' id="freguesias" disabled></select>

                    </div>
                </div>
            </div>

            <div class="form-row">


                <div class="col">
                    <div class="form-group">
                        <label for="hea">Data de Nascimento</label>
                        <?php echo $this->Form->text('data_nascimento', ['label' => false, 'class' => 'form-control', 'type' => 'date']); ?>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="cc">Cartão de Cidadão</label>
                        <?php echo $this->Form->control('cc', ['label' => false, 'class' => 'form-control']); ?>

                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="nif">Numero de Contribuinte</label>
                        <?php echo $this->Form->control('nif', ['label' => false, 'class' => 'form-control', 'type' => 'text']); ?>

                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="outroidentifica">Outra Identificação</label>
                        <?php echo $this->Form->control('outroidentifica', ['label' => false, 'class' => 'form-control']); ?>

                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="centro_edu">Centro Educacional</label>
                        <?php echo $this->Form->control('centro_educs_id', ['label' => false, 'class' => 'form-control', 'empty' => ['' => ''], 'options' => $centro_educs]); ?>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="estb_pri">Estabelecimento Prisional</label>

                        <?php echo $this->Form->control('estb_pris_id', ['label' => false, 'class' => 'form-control', 'empty' => ['' => ''], 'options' => $estb_pris]); ?>

                    </div>
                </div>

            </div>

            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="observacoes">Observações</label>

                        <?php echo $this->Form->control('observacoes', ['label' => false, 'class' => 'form-control']); ?>


                    </div>
                </div>
            </div>




        </div>
    </div>
    <div class="card-footer card-footer-fixed">
        <?= $this->Form->button(__('Gravar'), ['class' => "btn btn-success"]) ?>
        <a href="/pessoas/index" class="btn btn-secondary"><?= __('Voltar') ?></a>
    </div>
    <?= $this->Form->end() ?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $('document').ready(function() {
        $('#codigo_postal1').keyup(function() {

            var searchkey = $('#codigo_postal').val();
            var searchkey1 = $('#codigo_postal1').val();
            searchTags(searchkey, searchkey1);
        });
        $('#codigo_postal').keyup(function() {

            var searchkey = $('#codigo_postal').val();
            var searchkey1 = $('#codigo_postal1').val();
            searchTags(searchkey, searchkey1);
        });


        function searchTags(keyword, keyword1) {
            var data = keyword;
            var data1 = keyword1;
            $.ajax({
                method: 'get',
                url: "<?php echo $this->Url->build(['controller' => 'Pessoas', 'action' => 'Search']); ?>",
                data: {
                    keyword: data,
                    keyword1: data1,

                },

                success: function(response) {
                    $('#distrito').html(response);
                }
            });
        };
    });
</script>