<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pessoa $pessoa
 */
?>
<style>
    #distritos,
    #concelhos,
    #freguesias {
        /* for Firefox */
        -moz-appearance: none;
        /* for Chrome */
        -webkit-appearance: none;
    }

    .hide {
        display: none;
    }
</style>
<?php echo $this->Html->css('https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'); ?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('Editar Registo de Pessoa') ?></h6>
    </div>
    <?= $this->Form->create($pessoa) ?>
    <div class='ml-4 mt-4 mr-4'>
        <div id='my-form-body'>
            <div class="form-row" style="margin-left: 1px; margin-bottom: 10px;">
                <label for="id" style="margin-right: 30px; padding-top: 8px;">ID da pessoa</label>
                <?php echo $this->Form->control('id', ['type' => 'text', 'label' => false, 'disabled' => true, 'class' => 'form-control', 'style' => 'width: 65%;']); ?>
                <label for="localDos" style="margin-right: 30px; padding-top: 8px;">Localização do dossier</label>
                <?php echo $this->Form->control('localDos', ['label' => false, 'class' => 'form-control', 'style' => 'width: 65%;', 'type' => 'text']); ?>
            </div>
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
                        <label for="nomemaae">Nome da Mãe</label>
                        <?php echo $this->Form->control('nomemae', ['label' => false, 'class' => 'form-control']); ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="id_estadocivil">Estado Civil</label>
                        <?php echo $this->Form->control('estadocivil_id', ['label' => false, 'type' => 'select', 'multiple' => false, 'options' => $estadocivils, 'class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="id_genero">Género</label>
                        <?php echo $this->Form->control('genero_id', ['label' => false, 'type' => 'select', 'multiple' => false, 'options' => $generos, 'class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="pais_id">Nacionalidade</label>
                        <?php echo $this->Form->control('pai_id', ['id' => 'pais_id', 'label' => false, 'type' => 'select', 'multiple' => false, 'default' => 193, 'options' => $pais, 'class' => 'form-control']); ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-8">
                    <div class="form-group">
                        <label for="morada">Morada</label>
                        <?php echo $this->Form->control('morada', ['label' => false, 'class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="col" id="id_cod">
                    <div class="form-group">
                        <label for="codigo_postal">Código Postal</label>
                        <div class="form-row">
                            <div class="col">
                                <?php echo $this->Form->number('codigo_postal', ['id' => 'codigo_postal', 'value' => h($pessoa->codigos_postai->NumCodigoPostal), 'max' => 9999, 'min' => 0000, 'label' => false, 'class' => 'form-control', 'required']); ?>
                            </div>
                            <div class="col">
                                <?php echo $this->Form->number('codigo_postal1', ['id' => 'codigo_postal1', 'value' => h($pessoa->codigos_postai->ExtCodigoPostal), 'max' => 999, 'min' => 000, 'label' => false, 'class' => 'form-control', 'required']); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row" id="distrito">
                <div class="col" id="id_dis">
                    <div class="form-group">
                        <label for="distritos">Distrito</label>
                        <select class='form-control' id="distritos" disabled>
                            <option></option>
                        </select>
                    </div>
                </div>
                <div class="col" id="id_con">
                    <div class="form-group">
                        <label for="concelhos">Concelho</label>
                        <select class='form-control' id="concelhos" disabled>
                            <option></option>
                        </select>
                    </div>
                </div>
                <div class="col" id="id_freg">
                    <div class="form-group">
                        <label for="freguesias">Freguesia</label>
                        <select class='form-control' id="freguesias" disabled>
                            <option><?= h($pessoa->codigos_postai->NomeLocalidade) ?></option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="hea">Data de Nascimento</label>
                        <?php echo $this->Form->text('data_nascimento', ['id' => "dataNasc", 'label' => false, 'value' => h($pessoa->data_nascimento->i18nFormat('yyyy-MM-dd')), 'class' => 'form-control', 'type' => 'date', 'onChange' => 'submitBday()']); ?>
                    </div>
                </div>
                <div class="col-1">
                    <div id="container">
                        <label for="age">Idade</label>
                        <?php echo $this->Form->control('age', ['id' => "idade", 'label' => false, 'class' => 'form-control', 'type' => 'number', 'disabled' => true]); ?>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="cc">Cartão de Cidadão</label>
                        <?php echo $this->Form->control('cc', ['label' => false, 'class' => 'form-control', 'type' => 'text', 'maxLength' => '9', 'required']); ?>
                        <div id='ccError'></div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="nif">Número de Contribuinte</label>
                        <?php echo $this->Form->control('nif', ['label' => false, 'class' => 'form-control', 'type' => 'number', 'maxLength' => '9', 'required']); ?>
                        <div id='nifError'></div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="outroidentifica">Outra Identificação</label>
                        <?php echo $this->Form->control('outroidentifica', ['label' => false, 'class' => 'form-control']); ?>
                    </div>
                </div>
            </div>

            <!-- <h5 style="color: #0000009c;">Contacto</h5>
            <div class="form-row" style="margin-left: 1px; margin-bottom: 10px;">
                <label for="nomeContact" style="margin-right: 30px; padding-top: 8px;">Nome</label>
                <?php echo $this->Form->control('nomeContact', ['label' => false, 'class' => 'form-control', 'style' => 'width: 450px;']); ?>

                <label for="tel" style="margin-right: 30px; padding-top: 8px; margin-left: 3%;">Telefone</label>
                <?php echo $this->Form->control('tel', ['id' => 'telefone1', 'name' => 'telefone1', 'label' => false, 'class' => 'form-control', 'style' => 'width: 80%;', 'type' => 'text']); ?>
            </div>

            <div class="form-row" style="margin-left: 1px; margin-bottom: 10px;">
                <label for="nomeContact2" style="margin-right: 30px; padding-top: 8px;">Nome</label>
                <?php echo $this->Form->control('nomeContact2', ['label' => false, 'class' => 'form-control', 'style' => 'width: 450px;']); ?>

                <label for="tel2" style="margin-right: 30px; padding-top: 8px; margin-left: 3%;">Telefone</label>
                <?php echo $this->Form->control('tel2', ['id' => 'telefone2', 'name' => 'telefone2', 'label' => false, 'class' => 'form-control', 'style' => 'width: 80%;', 'type' => 'text']); ?>
            </div>

            <div class="form-row" style="margin-left: 1px; margin-bottom: 10px;">
                <label for="nomeContact3" style="margin-right: 30px; padding-top: 8px;">Nome</label>
                <?php echo $this->Form->control('nomeContact3', ['label' => false, 'class' => 'form-control', 'style' => 'width: 450px;']); ?>

                <label for="tel3" style="margin-right: 30px; padding-top: 8px; margin-left: 3%;">Telefone</label>
                <?php echo $this->Form->control('tel3', ['id' => 'telefone3', 'name' => 'telefone3', 'label' => false, 'class' => 'form-control', 'style' => 'width: 80%;', 'type' => 'text']); ?>
            </div> -->

            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="observacoes">Observações</label>
                        <?php echo $this->Form->control('observacoes', ['type' => 'textarea', 'label' => false, 'class' => 'form-control']); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer card-footer-fixed">
        <?= $this->Form->button(__('Gravar'), ['class' => "btn btn-success float-right"]) ?>
        <a href="/pessoas/index" class="btn btn-secondary float-right space-right"><?= __('Voltar') ?></a>
    </div>
    <?= $this->Form->end() ?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css" integrity="sha512-CbQfNVBSMAYmnzP3IC+mZZmYMP2HUnVkV4+PwuhpiMUmITtSpS7Prr3fNncV1RBOnWxzz4pYQ5EAGG4ck46Oig==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script>
    $.fn.select2.defaults.set("theme", "bootstrap");

    //Cc validation
    $('#cc').change(function() {
        if ($('#cc').val().length < 9) {
            $("#ccError").html("O cartão de cidadão tem que ter 9 dígitos.").addClass("error-msg");
        } else {
            $("#ccError").html("").removeClass("error-msg");
        }
    });

    //Nif validations
    $('#nif').change(function() {

        if (validateNIF($('#nif').val())) {
            $("#nifError").html("").removeClass("error-msg");
        } else {
            $("#nifError").html("Número de Contribuinte inválido.").addClass("error-msg");
        }
    });

    function validateNIF(nif) {
        if (!['1', '2', '3', '5', '6', '8'].includes(nif.substr(0, 1)) &&
            !['45', '70', '71', '72', '77', '79', '90', '91', '98', '99'].includes(nif.substr(0, 2)))
            return false;

        let total = nif[0] * 9 + nif[1] * 8 + nif[2] * 7 + nif[3] * 6 + nif[4] * 5 + nif[5] * 4 + nif[6] * 3 + nif[7] * 2;

        let modulo11 = total - parseInt(total / 11) * 11;
        let comparador = modulo11 == 1 || modulo11 == 0 ? 0 : 11 - modulo11;

        return nif[8] == comparador

    }

    function submitBday() {
        var today = new Date();
        var birthDate = new Date($("#dataNasc").val());
        var age = today.getFullYear() - birthDate.getFullYear();
        var m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        $("#idade").val(age);
    }

    $('document').ready(function() {

        $('#pais_id').change(function() {
            if ($('#pais_id').val() == 193) {
                $('#codigo_postal').removeAttr('disabled');
                $('#codigo_postal1').removeAttr('disabled');

                $('#distrito').removeClass('hide');
                $('#id_cod').removeClass('hide');
            } else {
                $('#codigo_postal').attr('disabled', true);
                $('#codigo_postal1').attr('disabled', true);
                $('#codigo_postal').val("");
                $('#codigo_postal1').val("");

                $('#distritos').val("");
                $('#concelhos').val("");
                $('#freguesias').val("");

                $('#distrito').addClass('hide');
                $('#id_cod').addClass('hide');
            }
        });

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
        $('#codigo_postal1').trigger("keyup");
        $('#dataNasc').trigger("onchange");

        //phone number validation
        $('#telefone1').keypress(function(e) {
            var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,3})(\d{0,2})/);
            e.target.value = '+351' + ' ' + x[2] + ' ' + x[3] + ' ' + x[4];
        });

        $('#telefone2').keypress(function(e) {
            var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,3})(\d{0,2})/);
            e.target.value = '+351' + ' ' + x[2] + ' ' + x[3] + ' ' + x[4];
        });

        $('#telefone3').keypress(function(e) {
            var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,3})(\d{0,2})/);
            e.target.value = '+351' + ' ' + x[2] + ' ' + x[3] + ' ' + x[4];
        });

    });
</script>